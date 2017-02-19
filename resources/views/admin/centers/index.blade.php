@extends('admin.body')





@section('body')
    <div class="page-title">
        <h2>Centres Sanitaires</h2>
    </div>




    <div class="mt-10 text-right mr-20">
        <a href="{{ route('centers.create') }}" class="btn btn-lg btn-blue">
            <i class="flaticon-cross"></i> Ajouter Centre
        </a>
    </div>

    <section class="page page-white">
        <div class="container-fluid">
            <div class="mt-10">
                <div class="material">
                    <form class="" action="" method="post">
                        {{ csrf_field() }}

                        <div class="group">
                            <input type="text" name="field" required>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Recherche</label>
                        </div>
                    </form>
                </div>
            </div>

            <div class="mt-40">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Ville</th>
                            <th>Quartier</th>
                            <th>Statut</th>
                            <th>Création</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr data-href="/admin/centers/1234-oiroiejfnfh-opew-iirjj38-ir34/edit">
                            <td class="bold">Centre de sante Maloine</td>
                            <td>Yaoundé</td>
                            <td>Obili</td>
                            <td>Actif</td>
                            <td>12/03/2017 13:55</td>
                        </tr>
                        <tr data-href="/admin/centers/1234-oiroiejfnfh-opew-iirjj38-ir34/edit">
                            <td class="bold">Hopital de district de biyem assi</td>
                            <td>Yaoundé</td>
                            <td>Biyem Assi</td>
                            <td>Actif</td>
                            <td>12/03/2017 13:55</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- End of table -->
        </div>
    </section>



    <div class="mt-20">
        <div class="text-center paginate">
            <nav aria-label="Page navigation">
              <ul class="pagination pagination-lg">
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul>
            </nav>
        </div>
    </div>


@endsection
