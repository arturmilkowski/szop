<?php

Route::namespace('Frontend')->name('frontend.')->group(
    function () {
        Route::get('/logowanie-rejestracja', 'LoginRegister\IndexController')->name('login_register.index');

        Route::namespace('Page')->name('pages.')->group(
            function () {
                Route::get('/', 'Index')->name('index');
                Route::get('/o-firmie', 'About')->name('about');
                Route::get('/pytania-i-odpowiedzi', 'Question')->name('question');
                Route::get('/dostawa', 'Delivery')->name('delivery');
                Route::get('/regulamin', 'TermCondition')->name('term_condition');
                Route::view('/ciastka', 'frontend/page/cookie', ['currentRouteName' => 'cookie'])->name('cookie');
                Route::view('/polityka-prywatnosci', 'frontend/page/privacy_policy', ['currentRouteName' => 'privacy_policy'])->name('privacy_policy');
                Route::get('/rodo', 'Rodo')->name('rodo');
                Route::namespace('Contact')->name('contacts.')->prefix('kontakt')->group(
                    function () {
                        Route::get('', 'Create')->name('create');
                        Route::post('', 'Store')->name('store');
                        Route::get('dziekuje-za-kontakt', 'Thank')->name('thank');
                    }
                );
            }
        );

        Route::namespace('Basket')->prefix('koszyk')->name('basket.')->group(
            function () {
                Route::post('dodaj/{type}', 'StoreController')->name('store');
                Route::delete('usun/{type}', 'DestroyController')->name('destroy');
                Route::get('usun', 'ClearController')->name('remove');
            }
        );

        Route::namespace('Order')->name('orders.')->group(
            function () {
                Route::namespace('Cash')->name('cash.')->group(
                    function () {
                        Route::get('/kasa', 'IndexController')->name('index');
                    }
                );
                Route::namespace('WithoutRegistration')->name('without_registration.')->group(
                    function () {
                        Route::get('/zamow-bez-rejestracji', 'CreateController')->name('create');
                        Route::post('/wyslij-zamowienie-bez-rejestracji', 'StoreController')->name('store');
                    }
                );
                Route::namespace('WithRegistration')->name('with_registration.')->group(
                    function () {
                        Route::post('/wyslij-zamowienie', 'StoreController')->name('store');
                    }
                );
                Route::namespace('Thank')->name('thank.')->group(
                    function () {
                        Route::get('/dziekuje-za-zamowienie', 'WithAuthorizationController')->name('with_authorization');
                        Route::get('/dziekuje-za-zamowienie-bez-rejestracji', 'WithoutAuthorizationController')->name('without_authorization');
                    }
                );
            }
        );

        Route::namespace('Blog')->name('blog.')->group(
            function () {
                Route::namespace('Post')->name('posts.')->group(
                    function () {
                        Route::get('/blog', 'Index')->name('index');

                        Route::namespace('Comment')->name('comments.')->group(
                            function () {
                                Route::post('/blog/{post:slug}/komentarze', 'Store')->name('store');
                                Route::get('/blog/komentarze/dziekuje-za-komentarz', 'Thank')->name('thank');
                            }
                        );
                    }
                );

                Route::namespace('Tag')->name('tags.')->group(
                    function () {
                        Route::get('/tagi', 'Index')->name('index');
                        Route::get('/tagi/{tag:slug}', 'Show')->name('show');
                    }
                );
            }
        );

        Route::namespace('Product')->name('product.')->group(
            function () {
                Route::get('/produkty', 'Index')->name('index');
                Route::get('/produkty/{product:slug}', 'Show')->name('show');
            }
        );
    }
);

Route::namespace('Backend')->prefix('konto')->name('backend.')->middleware('auth')->group(
    function () {
        Route::namespace('Admin')->prefix('admin')->name('admins.')->group(
            function () {
                Route::get('/admin', 'Index\IndexController')->name('index');

                Route::namespace('User')
                    ->prefix('uzytkownicy')
                    ->name('users.')->group(
                        function () {
                            Route::get('index', 'IndexController')->name('index');
                            Route::get('utworz', 'CreateController')->name('create');
                            Route::post('', 'StoreController')->name('store');
                            Route::get('{user}', 'ShowController')->name('show');
                            Route::get('{user}/edytuj', 'EditController')->name('edit');
                            Route::put('{user}', 'UpdateController')->name('update');
                            Route::delete('{user}', 'DestroyController')->name('destroy');
                        }
                    );

                Route::namespace('Customer')
                    ->prefix('klienci')
                    ->name('customers.')
                    ->group(
                        function () {
                            Route::get('', 'IndexController')->name('index');
                        }
                    );

                Route::namespace('Product')
                    ->prefix('produkty')
                    ->name('products.')
                    ->group(
                        function () {
                            Route::get('index', 'Index')->name('index.index');

                            Route::namespace('Brand')
                                ->prefix('producenci')
                                ->name('brands.')
                                ->group(
                                    function () {
                                        Route::get('', 'Index')->name('index');
                                        Route::get('utworz', 'Create')->name('create');
                                        Route::post('', 'Store')->name('store');
                                        Route::get('{brand}', 'Show')->name('show');
                                        Route::get('{brand}/edytuj', 'Edit')->name('edit');
                                        Route::put('{brand}', 'Update')->name('update');
                                        Route::delete('{brand}', 'Destroy')->name('destroy');
                                    }
                                );

                            Route::namespace('Category')
                                ->prefix('kategorie')
                                ->name('categories.')
                                ->group(
                                    function () {
                                        Route::get('', 'Index')->name('index');
                                        Route::get('utworz', 'Create')->name('create');
                                        Route::post('', 'Store')->name('store');
                                        Route::get('{category}', 'Show')->name('show');
                                        Route::get('{category}/edytuj', 'Edit')->name('edit');
                                        Route::put('{category}', 'Update')->name('update');
                                        Route::delete('{category}', 'Destroy')->name('destroy');
                                    }
                                );
                                Route::namespace('Concentration')
                                    ->prefix('koncentracja')
                                    ->name('concentrations.')
                                    ->group(
                                        function () {
                                            Route::get('', 'Index')->name('index');
                                            Route::get('utworz', 'Create')->name('create');
                                            Route::post('', 'Store')->name('store');
                                            Route::get('{concentration}', 'Show')->name('show');
                                            Route::get('{concentration}/edytuj', 'Edit')->name('edit');
                                            Route::put('{concentration}', 'Update')->name('update');
                                            Route::delete('{concentration}', 'Destroy')->name('destroy');
                                        }
                                    );

                            Route::namespace('Product')
                                // ->name('types.')
                                ->group(
                                    function () {
                                        Route::get('', 'IndexController')->name('index');
                                        Route::get('utworz', 'CreateController')->name('create');
                                        Route::post('', 'StoreController')->name('store');
                                        Route::get('{product}', 'ShowController')->name('show');
                                        Route::get('{product}/edytuj', 'EditController')->name('edit');
                                        Route::put('{product}', 'UpdateController')->name('update');
                                        Route::delete('{product}', 'DestroyController')->name('destroy');
                                        Route::delete('{product}/usun-grafike', 'DestroyImgController')->name('destroy_img');

                                        Route::namespace('Type')
                                            ->name('types.')
                                            ->group(
                                                function () {
                                                    Route::get('{product}/typy/utworz', 'CreateController')->name('create');
                                                    Route::post('{product}/typy', 'StoreController')->name('store');
                                                    Route::get('{product}/typy/{type}', 'ShowController')->name('show');
                                                    Route::get('{product}/typy/{type}/edytuj', 'EditController')->name('edit');
                                                    Route::put('{product}/typy/{type}', 'UpdateController')->name('update');
                                                    Route::delete('{product}/typy/{type}', 'DestroyController')->name('destroy');
                                                    Route::delete('{product}/typy/{type}/usun-grafike', 'DestroyImgController')->name('destroy_img');
                                                }
                                            );
                                    }
                                );
                        }
                    );

                Route::namespace('Order')
                    ->prefix('zamówienia')
                    ->name('orders.')
                    ->group(
                        function () {
                            Route::get('', 'IndexController')->name('index');
                            Route::get('{order}', 'ShowController')->name('show');
                            Route::get('{order}/edytuj', 'EditController')->name('edit');
                            Route::put('{order}', 'UpdateController')->name('update');
                            
                            Route::namespace('Printing')
                                ->prefix('drukowanie')
                                ->name('prints.')
                                ->group(
                                    function () {
                                        Route::get('html/{order}', 'HtmlController')->name('html');
                                        Route::get('pdf/{order}', 'PdfController')->name('pdf');
                                    }
                                );
                        }
                    );

                Route::namespace('Cache')
                    ->prefix('pamiec-podreczna')
                    ->name('cache.')
                    ->group(
                        function () {
                            Route::get('', 'Index')->name('index');
                        }
                    );

                Route::namespace('Blog')
                    ->prefix('blog')
                    ->name('blogs.')
                    ->group(
                        function () {
                            Route::get('', 'Index')->name('index');

                            Route::namespace('Tag')
                                ->prefix('tagi')
                                ->name('tags.')
                                ->group(
                                    function () {
                                        Route::get('', 'Index')->name('index');
                                        Route::get('utworz', 'Create')->name('create');
                                        Route::post('', 'Store')->name('store');
                                        Route::get('{tag}', 'Show')->name('show');
                                        Route::get('{tag}/edytuj', 'Edit')->name('edit');
                                        Route::put('{tag}', 'Update')->name('update');
                                        Route::delete('{tag}', 'Destroy')->name('destroy');
                                    }
                                );
                            Route::namespace('Post')
                                ->prefix('wpisy')
                                ->name('posts.')
                                ->group(
                                    function () {
                                        Route::get('', 'Index')->name('index');
                                        Route::get('utworz', 'Create')->name('create');
                                        Route::post('', 'Store')->name('store');
                                        Route::get('{post}', 'Show')->name('show');
                                        Route::get('{post}/edytuj', 'Edit')->name('edit');
                                        Route::put('{post}', 'Update')->name('update');
                                        Route::delete('{post}', 'Destroy')->name('destroy');
                                        Route::delete('{post}/usun-grafike', 'DestroyImg')->name('destroy_img');
                                        Route::delete('{post}/usun-tag/{tag}', 'DestroyTag')->name('destroy_tag');
                                    }
                                );

                            Route::namespace('Comment')
                                ->prefix('komentarze')
                                ->name('comments.')
                                ->group(
                                    function () {
                                        Route::get('', 'Index')->name('index');
                                        Route::get('{comment}', 'Show')->name('show');
                                        Route::get('{comment}/edytuj', 'Edit')->name('edit');
                                        Route::put('{comment}', 'Update')->name('update');
                                        Route::delete('{comment}', 'Destroy')->name('destroy');
                                    }
                                );
                        }
                    );
            }
        );

        Route::namespace('User')->name('users.')->group(
            function () {
                Route::get('/', 'Index\Index')->name('index');

                Route::namespace('Profile')
                    ->prefix('dane')
                    ->name('profiles.')
                    ->group(
                        function () {
                            Route::get('utworz', 'Create')->name('create');
                            Route::post('', 'Store')->name('store');
                            Route::get('{profile}', 'Show')->name('show');
                            Route::get('{profile}/edytuj', 'Edit')->name('edit');
                            Route::put('{profile}', 'Update')->name('update');
                            Route::delete('{profile}', 'Destroy')->name('destroy');

                            Route::namespace('DeliveryAddress')
                                ->name('delivery_addresses.')
                                ->group(
                                    function () {
                                        Route::get('{profile}/adres-dostawy/utworz', 'Create')->name('create');
                                        Route::post('{profile}/adres-dostawy', 'Store')->name('store');
                                        Route::get('{profile}/adres-dostawy/{deliveryAddress}', 'Show')->name('show');
                                        Route::get('{profile}/adres-dostawy/{deliveryAddress}/edytuj', 'Edit')->name('edit');
                                        Route::put('{profile}/adres-dostawy/{deliveryAddress}', 'Update')->name('update');
                                        Route::delete('{profile}/adres-dostawy/{deliveryAddress}', 'Destroy')->name('destroy');
                                    }
                                );
                            Route::namespace('Password')
                                ->name('password.')
                                ->group(
                                    function () {
                                        Route::get('{profile}/haslo/edytuj', 'Edit')->name('edit');
                                        Route::put('{profile}/haslo', 'Update')->name('update');
                                    }
                                );
                        }
                    );

                Route::namespace('Order')
                    ->prefix('zamowienia')
                    ->name('orders.')
                    ->group(
                        function () {
                            Route::get('', 'IndexController')->name('index');
                            Route::get('{order}', 'ShowController')->name('show');

                            Route::namespace('Printing')
                                ->prefix('drukowanie')
                                ->name('prints.')
                                ->group(
                                    function () {
                                        Route::get('html/{order}', 'HtmlController')->name('html');
                                        Route::get('pdf/{order}', 'PdfController')->name('pdf');
                                    }
                                );
                        }
                    );
            }
        );
    }
);

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// it must be at the end
Route::get('{post:slug?}', 'Frontend\Blog\Post\Show')->name('frontend.blog.posts.show');
