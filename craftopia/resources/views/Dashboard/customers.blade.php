<x-adminheader title="Customers" />
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">




    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
           
              <p class="card-title mt-2 mb-2 px-2">Our Customers</p>
            

            <div class="table-responsive">
              <table class="table table-striped table-borderless">
                <thead>
                  <tr>
                    <th>#.</th>
                    <th>Full Name</th>
                    <th>Picture</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Registration Date</th>
                    <th>Status </th>
                    <th>Action</th>
                   
                  </tr>
                </thead>
                <tbody>

                  @php
                    $i=0;
                  @endphp

                  @foreach ($customers as $item)
                  @php
                  $i++;
                @endphp

                  <tr>
                    <td>{{ $i }}</td>
                    <td>{{$item->fullname}}</td>
                    <td><img src="{{asset('uploads/profiles/'.$item->picture)}}" alt="" width='100px'></td>
                    <td>{{$item->email}}</td>
                    <td class="font-weight-bold">{{$item->type}}</td>
                    <td>{{$item->created_at}}</td>
                    <td class="font-weight-bold">{{$item->status}}</td>
                  

                   
                    <td>
                      @if($item->status == 'Active')
                        <a href="{{ route('changeUserStatus', ['status' => 'Blocked', 'id' => $item->id]) }}" class="btn btn-danger">Block</a>
                      @else
                        <a href="{{ route('changeUserStatus', ['status' => 'Active', 'id' => $item->id]) }}" class="btn btn-success">Un-Block</a>
                      @endif
                    </td>
                    
                    

                  </tr>

                  @endforeach


                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>


    </div>


  </div>
  <!-- content-wrapper ends -->
  <x-adminfooter />