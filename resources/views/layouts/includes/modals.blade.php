<!-- Fade In Block Modal -->
        <div class="modal fade" id="modal-block-fadein" tabindex="-1" role="dialog" aria-labelledby="modal-block-fadein" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Ajouter nouvel voiture</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>

                        <div class="block-content font-size-sm">
                            <form action="/manager/voitures"  method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="marque">MARQUE:</label>
                                        <input type="text" class="form-control" id="marque" name="marque" required >
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="modele">MODELE:</label>
                                        <input type="text" class="form-control" id="modele" name="modele" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="moteur">MOTEUR:</label>
                                        <input type="text" class="form-control" id="moteur" name="moteur" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="prix">PRIX:</label>
                                        <input type="text" class="form-control" id="prix" name="prix" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="matricule">IMMATRICULATION:</label>
                                        <input type="text" class="form-control" id="matricule" name="matricule" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>IMAGE:</label>
                                        <div class="custom-file">
                                             <input type="file" class="custom-file-input " data-toggle="custom-file-input"
                                                            id="voiture_image" name="voiture_image" required>
                                             <label class="custom-file-label" for="voiture_image">Choisir image</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-content block-content-full text-right border-top">
                                    <button type="reset" class="btn btn-sm btn-light" data-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn js-swal-success btn-sm btn-primary">Valider</button>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
<!-- END Fade In Block Modal -->

<!-- Opens from the modal toggle button in the header -->
            <div class="modal fade" id="one-modal-apps" tabindex="-1" role="dialog" aria-labelledby="one-modal-apps" aria-hidden="true">
                <div class="modal-dialog modal-dialog-top modal-sm" role="document">
                    <div class="modal-content">
                        <div class="block block-themed block-transparent mb-0">
                            <div class="block-header bg-primary-dark">
                                <h3 class="block-title">Apps</h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                        <i class="si si-close" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="block-content block-content-full">
                                <div class="row gutters-tiny">
                                    <div class="col-6">
                                        <!-- CRM -->
                                        <a class="block block-rounded block-themed bg-default" href="javascript:void(0)">
                                            <div class="block-content text-center">
                                                <i class="si si-speedometer fa-2x text-white-75" aria-hidden="true"></i>
                                                <p class="font-w600 font-size-sm text-white mt-2 mb-3">
                                                    CRM
                                                </p>
                                            </div>
                                        </a>
                                        <!-- END CRM -->
                                    </div>
                                    <div class="col-6">
                                        <!-- Products -->
                                        <a class="block block-rounded block-themed bg-danger" href="javascript:void(0)">
                                            <div class="block-content text-center">
                                                <i class="si si-rocket fa-2x text-white-75" aria-hidden="true"></i>
                                                <p class="font-w600 font-size-sm text-white mt-2 mb-3">
                                                    Products
                                                </p>
                                            </div>
                                        </a>
                                        <!-- END Products -->
                                    </div>
                                    <div class="col-6">
                                        <!-- Sales -->
                                        <a class="block block-rounded block-themed bg-success mb-0" href="javascript:void(0)">
                                            <div class="block-content text-center">
                                                <i class="si si-plane fa-2x text-white-75" aria-hidden="true"></i>
                                                <p class="font-w600 font-size-sm text-white mt-2 mb-3">
                                                    Sales
                                                </p>
                                            </div>
                                        </a>
                                        <!-- END Sales -->
                                    </div>
                                    <div class="col-6">
                                        <!-- Payments -->
                                        <a class="block block-rounded block-themed bg-warning mb-0" href="javascript:void(0)">
                                            <div class="block-content text-center">
                                                <i class="si si-wallet fa-2x text-white-75" aria-hidden="true"></i>
                                                <p class="font-w600 font-size-sm text-white mt-2 mb-3">
                                                    Payments
                                                </p>
                                            </div>
                                        </a>
                                        <!-- END Payments -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!-- END Opens from the modal toggle button in the header -->
