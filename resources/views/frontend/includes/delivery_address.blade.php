                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">ulica i numer mieszkania</th>
                                <td>{{ $deliveryAddress->street }}</td>
                            </tr>
                            <tr>
                                <th scope="row">kod pocztowy i miato</th>
                                <td>{{ $deliveryAddress->zip_code }} {{ $deliveryAddress->city }}</td>
                            </tr>
                            <tr>
                                <th scope="row">województwo</th>
                                <td>{{ $deliveryAddress->voivodeship->name }}</td>
                            </tr>
                        </tbody>
                    </table>
