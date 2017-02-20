@extends('admin.body')


@section('body')
    <div class="page-heading">
        <div class="buttons">
            <a href="{{ route('pages.create') }}" class="btn btn-lg btn-green">
                <i class="flaticon-cross"></i> New Page
            </a>
        </div>

        <div class="title">
            Pages
        </div>
    </div>

    <section class="page page-white">
        <div class="container-fluid">

            @include('errors.list')

            <div class="mt-10">
                <div class="row">
                    <form class="form" action="" method="get">
                        <div class="col-sm-4">
                            <div class="form-select grey">
                                <select class="" name="status">
                                    <option value="">All</option>
                                    <option value="published" {{ Request::get('status') == 'published' ? 'selected' : '' }}>Published</option>
                                    <option value="unpublished" {{ Request::get('status') == 'unpublished' ? 'selected' : '' }}>Unpublished</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <input type="text"
                                        name="keywords"
                                        class="form-control input-lg"
                                        value="{{ Request::get('keywords') }}"
                                        placeholder="Page title">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <button type="submit" class="btn btn-lg btn-blue btn-block">
                                        Filter
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>



            <div class="mt-10">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Published</th>
                            <th>Created</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($pages as $page)
                            <tr data-href="{{ route('pages.edit', $page->id) }}">
                                <td class="bold">{{ $page->title }}</td>
                                <td>{{ $page->slug }}</td>
                                <td>{{ $page->status === 'published' ? 'Yes' : 'No'}}</td>
                                <td>{{ date('d/m/Y H:i', strtotime($page->created_at)) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- End of table -->
        </div>
    </section>

@endsection
