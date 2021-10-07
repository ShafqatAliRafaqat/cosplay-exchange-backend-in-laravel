<x-layout.app>
    <div class="mt-5">
        <div class="container">
            <div class="row">
                @foreach([0,1,3] as $item)
                <div class="col-4 text-center">
                    <h1 class="mb-0">1st place - Friday</h1>
                    <a href="#" class="btn btn-lg btn-link mt-0 mt-n2">C2E2 - Chicago, IL</a>
                    <div class="d-flex justify-content-center align-items-center mt-2">
                        <img src="https://via.placeholder.com/150" height="40px" width="40px" class="glow rounded-circle" alt="imageplacehodler">
                        <h3 class="font-weight-bolder mb-0 ml-3">CityBurt</h3>
                    </div>
                    <img src="https://via.placeholder.com/300" class="img-fluid mt-4" alt="imagefluid">
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layout.app>
