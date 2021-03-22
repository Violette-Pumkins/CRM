    <div class="container-xl">
        <div class="row">
            <div class="col-md">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="index.php" method="get">
                            <tr>
                                <td> <label for="nom">Nom:</label></td>
                                <td> <input type="text" name="nom"> <br><br>
                                </td>
                            </tr>
                            <tr>
                                <td> <label for="prénom">Prénom:</label></td>
                                <td> <input type="text" name="prénom"> <br><br>
                                </td>
                            </tr>
                                <td> <label for="adresse">Adresse:</label></td>
                                <td> <input type="text" name="adresse"> <br><br>
                                </td>
                            </tr>
                                <td> <label for="tel">Téléphone:</label></td>
                                <td> <input type="text" name="tel"> <br><br>
                                </td>
                            </tr>
                                <td> <label for="tel">Portable:</label></td>
                                <td> <input type="text" name="tel"> <br><br>
                                </td>
                            </tr>
                                <td> <label for="mail">Mail:</label></td>
                                <td> <input type="text" name="mail"> <br><br>
                                </td>
                            </tr>
                                <td> <label for="v-v">Visible sur vales:</label></td>
                                <td> <input type="checkbox" name="v-v" style="height:25px; width:25px;"> <br><br>
                                </td>
                            </tr>
                                <td> <label for="v-c">Visible sur ceres:</label></td>
                                <td> <input type="checkbox" name="v-c" style="height:25px; width:25px;"> <br><br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="hidden" name="action" value="<?php echo $action . "MAJ" ?>">
                                </td>
                            </tr>

                    </tbody>
                </table>
            </div>
            <div class="col-md">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="index.php" method="get">
                            <tr>
                                <td> <label for="nom">Nom entreprise:</label></td>
                                <td> <input type="text" name="nom"> <br><br>
                                </td>
                            </tr>
                            <td> <label for="adresse">Adresse:</label></td>
                            <td> <input type="text" name="adresse"> <br><br>
                            </td>
                            </tr>
                            <td> <label for="tel">Téléphone:</label></td>
                            <td> <input type="text" name="tel"> <br><br>
                            </td>
                            </tr>
                            <td> <label for="tel">Portable:</label></td>
                            <td> <input type="text" name="tel"> <br><br>
                            </td>
                            </tr>
                            <td> <label for="mail">Mail</label></td>
                            <td> <input type="text" name="mail"> <br><br>
                            </td>
                            </tr>
                            <td>
                                <input type="hidden" name="action" value="<?php echo $action . "MAJ" ?>">
                            </td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="submit" name="add" value="add" class="btn btn-outline-success">Validez</button>
                                </td>
                            </tr>
                        </form>
                    </tbody>
                </table>
            </div>
        </div>

    </div>