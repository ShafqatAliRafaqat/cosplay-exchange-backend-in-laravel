<x-layout.app>
    <div class="mt-5">
        <div class="container">
            <div class="d-flex align-items-center justify-content-start mb-5">
                <h1 class="display-5 mb-0 mr-5">Choose State</h1>
                <select class="col-3 form-control form-control-lg bg-primary text-white">
                    @foreach($us_states as $key => $state)
                        <option value="{{$key}}">{{$state}}</option>
                    @endforeach
                </select>
            </div>

            <div class="row">
                @foreach([0,1,3] as $item)
                    <div class="col-4 text-center">
                        <h1 class="mb-3 font-weight-bolder">Leather Smith</h1>
                        <p class="my-0">Lorem ipsum dolor sit.</p>
                        <p class="my-0">Phone: Lorem ipsum dolor sit.</p>
                        <p class="my-0">Email: Lorem ipsum dolor sit.</p>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layout.app>
