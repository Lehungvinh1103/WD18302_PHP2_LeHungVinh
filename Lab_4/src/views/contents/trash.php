<!-- Button trigger modal -->
<!-- <button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  New folder
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Folder</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="">
                    <input type="text" class="form-control" placeholder="Tên thư mục">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn bg-gradient-primary">Create</button>
            </div>
        </div>
    </div>
</div>
<!-- 
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <h6>Authors table</h6>
        <i class="bi bi-plus"></i>
      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <h6>Projects table</h6>
      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
        </div>
      </div>
    </div>
  </div>
</div> -->

<div class="col-md-12">
    <div class="filter d-flex align-items-center">
        <h5>Bin for My File</h5>
        <!-- <div class="input-group rounded-pill">
            <a class="btn mb-0">Files</a>
            <a class="btn mb-0"> Folders</a>
        </div> -->
    </div>
    <div class=" pt-0">
        <div>
            <!-- Thêm nội dung cần cuộn vào đây -->
            <div class="overflow-auto" style="max-height: 500px;">
                <div class="trash mt-5">
                    <div class="img-trash d-flex align-items-center justify-content-center">
                        <img width="30%" src="<?php __DIR__?>/public/assets/img/trash.jpg" alt="">
                    </div>
                    <h5 class="text-center">Không có tệp nào trong thùng rác</h5>
                    <p class="text-center">Di chuyển các tệp bạn không sử dụng vào thùng rác. Các mục này sẽ xóa vĩnh viễn sau 30 ngày.</p>
                </div>
            </div>
        </div>
    </div>

</div>