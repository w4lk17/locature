<!-- Create voiture Modal -->
<div class="modal fade" id="modal-block-fadein" tabindex="-1" role="dialog" aria-labelledby="modal-block-fadein"
    aria-hidden="true">
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
                    <form action="/manager/voitures" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="marque">MARQUE:</label>
                                <input type="text" class="form-control" id="marque" name="marque" required>
                                @if($errors->has('marque')) <span class="error"> {{ $errors->first("marque")
                                    }}</span>@endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="modele">MODELE:</label>
                                <input type="text" class="form-control" id="modele" name="modele" required>
                                @if($errors->has('modele')) <span class="error"> {{ $errors->first("modele")
                                    }}</span>@endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="carburant">carburant:</label>
                                <input type="text" class="form-control" id="carburant" name="carburant" required>
                                @if($errors->has('carburant')) <span class="error"> {{ $errors->first("carburant")
                                    }}</span>@endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="prix">PRIX:</label>
                                <input type="text" class="form-control" id="prix" name="prix" required>
                                @if($errors->has('prix')) <span class="error"> {{ $errors->first("prix") }}</span>@endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="matricule">IMMATRICULATION:</label>
                                <input type="text" class="form-control" id="matricule" name="matricule" required>
                                @if($errors->has('matricule')) <span class="error"> {{ $errors->first("matricule")
                                    }}</span>@endif
                            </div>
                            <div class="form-group col-md-6">
                                <label>IMAGE:</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input " data-toggle="custom-file-input"
                                        id="voiture_image" name="voiture_image" required>
                                    <label class="custom-file-label" for="voiture_image">Choisir image (max size
                                        2Mb)</label>
                                </div>
                            </div>
                        </div>
                        <div class="block-content block-content-full text-right border-top">
                            <button type="reset" class="btn btn-sm btn-light" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-sm btn-primary ">Valider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Create voiture Modal -->

<!-- Create voiture Admin Modal -->
<div class="modal fade" id="modal-block-fadeinA" tabindex="-1" role="dialog" aria-labelledby="modal-block-fadeinA"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Ajouter nouvelle voiture</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>

                <div class="block-content font-size-sm">
                    <form action="/admin/cars" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="marque">MARQUE:</label>
                                <input type="text" class="form-control" id="marque" name="marque" required>
                                @if($errors->has('marque')) <span class="error"> {{ $errors->first("marque")
                                    }}</span>@endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="modele">MODELE:</label>
                                <input type="text" class="form-control" id="modele" name="modele" required>
                                @if($errors->has('modele')) <span class="error"> {{ $errors->first("modele")
                                    }}</span>@endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="carburant">carburant:</label>
                                <input type="text" class="form-control" id="carburant" name="carburant" required>
                                @if($errors->has('carburant')) <span class="error"> {{ $errors->first("carburant")
                                    }}</span>@endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="prix">PRIX:</label>
                                <input type="text" class="form-control" id="prix" name="prix" required>
                                @if($errors->has('prix')) <span class="error"> {{ $errors->first("prix") }}</span>@endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="matricule">IMMATRICULATION:</label>
                                <input type="text" class="form-control" id="matricule" name="matricule" required>
                                @if($errors->has('matricule')) <span class="error"> {{ $errors->first("matricule")
                                    }}</span>@endif
                            </div>
                            <div class="form-group col-md-6">
                                <label>IMAGE:</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input " data-toggle="custom-file-input"
                                        id="voiture_image" name="voiture_image" required>
                                    <label class="custom-file-label" for="voiture_image">Choisir image (max size
                                        2Mb)</label>
                                </div>
                            </div>
                        </div>
                        <div class="block-content block-content-full text-right border-top">
                            <button type="reset" class="btn btn-sm btn-light" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-sm btn-primary ">Valider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Create voiture Admin Modal -->


<!-- Create user Modal -->
<div class="modal fade" id="modal-block-fadeinU" tabindex="-1" role="dialog" aria-labelledby="modal-block-fadeinU"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Ajouter nouvel Utilisateur</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>

                <div class="block-content font-size-sm">
                    <form action="/admin/users" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form">
                            <div class="form-group col-md-6">
                                <label for="example-text-input">NOM:</label>
                                <input type="text" class="form-control {{ $errors->has('last_name') ? 'error' : '' }}"
                                    id="signup-username" name="last_name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="example-text-input">PRENOM:</label>
                                <input type="text" class="form-control {{ $errors->has('first_name') ? 'error' : '' }}"
                                    id="signup-username" name="first_name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="example-email-input">EMAIL:</label>
                                <input type="email" class="form-control {{ $errors->has('email') ? 'error' : '' }}"
                                    id="signup-email" name="email" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>ROLES:</label>
                                {{-- <div class="custom-control custom-radio mb-1">
                                    <input type="radio" class="custom-control-input" id="example-radio-custom1"
                                        name="role" value="admin" checked>
                                    <label class="custom-control-label"
                                        for="example-radio-custom1">Administrateur</label>
                                </div> --}}
                                <div class="custom-control custom-radio mb-1">
                                    <input type="radio"
                                        class="custom-control-input {{ $errors->has('role') ? 'error' : '' }}"
                                        id="example-radio-custom2" name="role" value="manager" required>
                                    <label class="custom-control-label" for="example-radio-custom2">Manager</label>
                                </div>
                            </div>
                        </div>
                        <div class="block-content block-content-full text-right border-top">
                            <button type="reset" class="btn btn-sm btn-light" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-sm btn-success ">Valider</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
<!-- End create user Modal -->

{{--
<!-- Delete invoice Modal -->
<div class="modal custom-modal fade" id="delete_invoice" role="dialog">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>Supprimer Facture</h3>
                    <p>Voulez-vous vraiment supprimer ?</p>
                </div>
                <form action="" method="POST">
                    @csrf
                    <input type="hidden" name="id" class="e_id" value="">
                    <input type="hidden" name="invoice_number" class="invoice_number" value="">
                    <div class="row">
                        <div class="col-6">
                            <button type="submit" class="btn btn-danger continue-btn submit-btn">Delete</button>
                        </div>
                        <div class="col-6">
                            <a href="javascript:void(0)" class="btn btn-primary cancel-btn"
                                data-dismiss="modal">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Delete Estimate Modal --> --}}


<!-- Opens from the modal toggle button in the header -->
<div class="modal fade" id="one-modal-apps" tabindex="-1" role="dialog" aria-labelledby="one-modal-apps"
    aria-hidden="true">
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