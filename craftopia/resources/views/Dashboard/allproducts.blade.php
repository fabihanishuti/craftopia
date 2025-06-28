<x-adminheader  title="Products"/>
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <p class="card-title mb-0">Top Products</p>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNewModel">
                Add Product
              </button>
            </div>


            <!-- The Modal -->
            <div class="modal" id="addNewModel">
              <div class="modal-dialog">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Add New Product</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                 <form action="{{ route('AddNewProduct')}}" method="POST" enctype="multipart/form-data">
                  @csrf

                  <label for="title">Title</label>
                  <input type="text" name="title" id="title" placeholder="Enter Title" class="form-control mb-2">
                  
                  <label for="price">Price</label>
                  <input type="text" name="price" id="price" placeholder="Enter Price ($)" class="form-control mb-2">
                  
                  <label for="quantity">Quantity</label>
                  <input type="number" name="quantity" id="quantity" placeholder="Enter Quantity" class="form-control mb-2">
                  
                  <label for="picture">Picture</label>
                  <input type="file" name="file" id="picture" class="form-control mb-2">
                  
                  <label for="description">Description</label>
                  <input type="text" name="description" id="description" placeholder="Enter Description" class="form-control mb-2">
                  
                  <label for="category">Category</label>
                  <select name="category" id="category" class="form-control mb-2">
                    <option value="">Select Category</option>
                    <option value="Art & Paintings">Art & Paintings</option>
                    <option value="Home Decor">Home Decor</option>
                    <option value="Eco-Friendly Crafts">Eco-Friendly Crafts</option>
                    <option value="Accessories">Accessories</option>
                  </select>

                  <label for="type">Type</label>
                  <select name="type" id="type" class="form-control mb-2">
                    <option value="">Select Type</option>
                    <option value="Best Sellers">Best Sellers</option>
                    <option value="New Arrivals">New Arrivals</option>
                    <option value="Hot Sales">Hot Sales</option>
                  </select>

                  <input type="submit" name="save" class="btn btn-success" value="Save Now" id="">
                  
                </form>
                  </div>

                 
                </div>
              </div>
            </div>


            <div class="table-responsive">
              <table class="table table-striped table-borderless">
                <thead>
                  <tr>
                    <th>Title</th>
                    <th>Picture</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Category</th>
                    <th>Type</th>
                    <th>Update</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>

                  @php
                    $i=0;
                  @endphp

                  @foreach ($allproducts as $item)
                  @php
                  $i++;
                @endphp

                  <tr>
                    <td>{{$item->title}}</td>
                    <td><img src="{{asset('uploads/products/'.$item->picture)}}" alt="" width='100px'></td>
                    <td class="font-weight-bold">${{$item->price}}</td>
                    <td>{{$item->quantity}}</td>
                    <td class="font-weight-medium">
                      <div class="badge badge-success">{{$item->category}}</div>
                    </td>
                    <td class="font-weight-medium">
                      <div class="badge badge-info">{{$item->type}}</div>
                    </td>

                    <td class="font-weight-medium">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateModel{{ $i }}">
                       Update
                      </button>
                    </div>
        
        
                    <!-- The Modal -->
                    <div class="modal" id="updateModel{{ $i }}">
                      <div class="modal-dialog">
                        <div class="modal-content">
        
                          <!-- Modal Header -->
                          <div class="modal-header">
                            <h4 class="modal-title">Update Product</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
        
                          <!-- Modal body -->
                          <div class="modal-body">
                         <form action="{{ route('updateProduct')}}" method="POST" enctype="multipart/form-data">
                          @csrf
        
                          <label for="title">Title</label>
                          <input type="text" name="title"  value="{{ $item->title}}"  id="title" placeholder="Enter Title" class="form-control mb-2">
                          
                          <label for="price">Price</label>
                          <input type="text" name="price"  value="{{ $item->price}}"  id="price" placeholder="Enter Price ($)" class="form-control mb-2">
                          
                          <label for="quantity">Quantity</label>
                          <input type="number" name="quantity" value="{{ $item->quantity}}"  id="quantity" placeholder="Enter Quantity" class="form-control mb-2">
                          
                          <label for="picture">Picture</label>
                          <input type="file" name="file" id="picture" class="form-control mb-2">
                          
                          <label for="description">Description</label>
                          <input type="text" name="description"  value="{{ $item->description}}"  id="description" placeholder="Enter Description" class="form-control mb-2">
                          
                          <label for="category">Category</label>
                          <select name="category" id="category" class="form-control mb-2">
                            <option value="{{$item->category}}">{{$item->category}}</option>
                            <option value="Art & Paintings">Art & Paintings</option>
                            <option value="Home Decor">Home Decor</option>
                            <option value="Eco-Friendly Crafts">Eco-Friendly Crafts</option>
                            <option value="Accessories">Accessories</option>
                          </select>
        
                          <label for="type">Type</label>
                          <select name="type" id="type" class="form-control mb-2">
                            <option value="{{$item->type}}">{{$item->type}}</option>
                            <option value="Best Sellers">Best Sellers</option>
                            <option value="New Arrivals">New Arrivals</option>
                            <option value="Hot Sales">Hot Sales</option>
                          </select>
        
                          <input type="hidden" name="id"  value="{{$item->id}}" id="">
                          <input type="submit" name="save" class="btn btn-success" value="Save Changes" id="">
                          
                        </form>
                          </div>
        
                         
                        </div>
                      </div>
                    </div>
                    </td>
                    <td>
                      <a href="{{ route('deleteProduct', ['id' => $item->id]) }}" class="btn btn-danger">Delete</a>

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