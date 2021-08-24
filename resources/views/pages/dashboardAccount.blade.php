@extends('layouts.dashboard')

@section('title')
    Home Store
@endsection

@section('content')
      <!-- Page Content -->
      <div
      class="section-content section-dashboard-home"
      data-aos="fade-up"
    >
      <div class="container-fluid">
        <div class="dashboard-heading">
          <h2 class="dashboard-title">My Account</h2>
          <p class="dashboard-subtitle">Update your current profile</p>
        </div>
        <div class="dashboard-content">
          <div class="row">
            <div class="col-12">
              <form action="{{ route('dashboard-setting-redirect', 'dashboard-account') }}" id="locations"  method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                  <div class="card-body">
                    <div class="row mb-2">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="name">Your Name</label>
                          <input
                            type="text"
                            class="form-control"
                            id="name"
                            aria-describedby="emailHelp"
                            name="name"
                            value="{{$users->name}}"
                          />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="email">Your Email</label>
                          <input
                            type="email"
                            class="form-control"
                            id="email"
                            aria-describedby="emailHelp"
                            name="email"
                            value="{{$users->email}}"
                          />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="address_one">Address 1</label>
                          <input
                            type="text"
                            class="form-control"
                            id="address_one"
                            aria-describedby="address_one"
                            name="address_one"
                            value="{{$users->address_one}}"
                          />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="address_two">Address 2</label>
                          <input
                            type="text"
                            class="form-control"
                            id="address_two"
                            aria-describedby="emailHelp"
                            name="address_two"
                            value="{{$users->address_two}}"
                          />
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="provinces_id">Province</label>
                          <select name="provinces_id" id="provinces_id" class="form-control"  v-model="provinces_id">
                            <option v-for="province in provinces" v-if="provinces" :value="province.id">@{{ province.name }}</option>
                            <option value="" v-else class="form-control" >Select Province</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="regencies_id">City</label>
                          <select name="regencies_id" id="regencies_id" class="form-control"  v-model="regencies_id">
                            <option  v-for="regency in regencies" v-if="regencies" :value="regency.id">@{{regency.name}}</option>
                            <option value="" v-else class="form-control" selected >Select Province First </option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="districts_id">Kecamatan</label>
                          <select name="districts_id" id="districts_id" class="form-control"  v-model="districts_id">
                            <option  v-for="district in districts" v-if="districts" :value="district.id">@{{district.name}}</option>
                            <option value="" v-else class="form-control" selected >Select Province First </option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label for="zip_code">Postal Code</label>
                          <input
                            type="text"
                            class="form-control"
                            id="zip_code"
                            name="zip_code"
                            value="{{$users->zip_code}}"
                          />
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group">
                          <label for="country">Country</label>
                          <input
                            type="text"
                            class="form-control"
                            id="country"
                            name="country"
                            value="{{$users->country}}"
                          />  
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group">
                          <label for="phone_number">phone_number</label>
                          <input
                            type="text"
                            class="form-control"
                            id="phone_number"
                            name="phone_number"
                            value="{{$users->phone_number}}"
                          />
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col text-right">
                        <button
                          type="submit"
                          class="btn btn-success px-5"
                        >
                          Save Now
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

     
      </div>
      <!-- /#page-content-wrapper -->
@endsection

   
@push('addon-script')
<script src="{{url('/vendor/vue/vue.js')}}"></script>
<script src="https://unpkg.com/vue-toasted"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
  var locations = new Vue({
    el: "#locations",
    mounted() {
      AOS.init();
      this.getProvincesData();
    },
    data: {
      provinces_id : null,
      regencies_id : null,
      districtss_id : null,
      districts : null,
      regencies : null,
      provinces : null
    },
    methods: {
      getProvincesData() {
        var self = this;
        axios.get('{{ route('api-provinces') }}')
        .then(function(response){
          self.provinces = response.data;
        })
      },
      getRegenciesData(){
        var self = this;
        axios.get('{{ url('api/regencies') }}/' + self.provinces_id)
        .then(function(response){
          self.regencies = response.data;
        })
      },
      getDistrictssData(){
        var self = this;
        axios.get('{{ url('api/districts') }}/' + self.regencies_id)
        .then(function(response){
          self.districts = response.data;
        })
      },
    },
    watch: {
      provinces_id: function(val, oldVal){
        this.regencies_id = null;
        this.getRegenciesData();
      },
      
      regencies_id: function(val, oldVal){
        this.districts_id = null;
        this.getDistrictssData();
      }

    }
  });
</script>
@endpush