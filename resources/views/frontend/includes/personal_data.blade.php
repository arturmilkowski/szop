                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">imię i nazwisko</th>
                                <td>{{ $user->name }} {{ $user->profile->lastname }}</td>
                            </tr>
                            <tr>
                                <th scope="row">ulica i numer mieszkania</th>
                                <td>{{ $user->profile->street }}</td>
                            </tr>
                            <tr>
                                <th scope="row">kod pocztowy i miasto</th>
                                <td>{{ $user->profile->zip_code }} {{ $user->profile->city }}</td>
                            </tr>
                            <tr>
                                <th scope="row">województwo</th>
                                <td>{{ $user->profile->voivodeship->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">email</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th scope="row">telefon</th>
                                <td>{{ $user->profile->phone }}</td>
                            </tr>
                        </tbody>
                    </table>
