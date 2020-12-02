<?php
include("imports.php");
include("nav.php");
include("./models/crud_produit.php");
include("./models/crud_categorie.php");
$targetDir = "products/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
$pr = new Produit();
$liste = $pr->list_produits();
$ca = new Categorie();
$ls = $ca->list_categories();
?>
<div class="main-container" id="container">
    <div class="overlay"></div>
    <div class="search-overlay"></div>
    <?php
    include("sidebar.php");
    ?>
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="row layout-top-spacing">

                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <div class="table-responsive mb-4 mt-4">
                            <!-- Button trigger modal -->
                            <div align="center"> <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal">
                                    Ajouter un produit </button>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <form enctype="multipart/form-data" method="POST" action="articles.php">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Produit</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <td>titre</td>
                                                        <td>
                                                            <input class="form-control" type="texte" required
                                                                name="titre">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>photo</td>
                                                        <td>
                                                            <input class="form-control" type="file" required
                                                                name="photo">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>description</td>
                                                        <td>
                                                            <textarea class="form-control" type="texte" required
                                                                name="description"></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>prix</td>
                                                        <td>
                                                            <input class="form-control" type="texte" required
                                                                name="prix">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>catégorie</td>
                                                        <td>
                                                            <select class="form-control" name="categorie">
                                                                <?php
                                                                while ($row = $ls->fetch_assoc()) {
                                                                ?> <option value="<?= $row["titre"] ?>">
                                                                    <?= $row["titre"] ?></option><?php } ?>
                                                            </select>
                                                        </td>
                                                    </tr>

                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">fermer</button>
                                                <button type="button" class="btn btn-primary">Ajouter</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <table class="multi-table table table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>titre</th>
                                        <th>photo</th>
                                        <th>description</th>
                                        <th>prix</th>
                                        <th>categorie</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = $liste->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td><?= $row["titre"] ?></td>
                                        <td><img src="<?= $row["photo"] ?>" width="200" height="200"></td>
                                        <td><?= $row["description"] ?></td>
                                        <td><?= $row["prix"] ?></td>
                                        <td><?= $row["categorie"] ?></td>


                                        <td class="text-center"> <a
                                                href="./controllers/ProduitController.php?id=<?= $row["id"] ?>"
                                                class="btn btn-danger">supprimer</a> </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>email</th>
                                        <th>tel</th>
                                        <th>Adresse</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                    </div>
                </div>

            </div>

        </div>
        <?php include("footer.php"); ?>
        <!--  END CONTENT AREA  -->
    </div>
    <script>
    $(document).ready(function() {
        App.init();
    });
    </script>
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="plugins/table/datatable/datatables.js"></script>
    <script>
    $(document).ready(function() {
        $('table.multi-table').DataTable({
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7,
            drawCallback: function() {
                $('.t-dot').tooltip({
                    template: '<div class="tooltip status" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
                })
                $('.dataTables_wrapper table').removeClass('table-striped');
            }
        });
    });
    </script>