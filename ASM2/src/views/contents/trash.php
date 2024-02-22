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
  <div class="mt-3 pt-0">
    <?php
    function formatSizeUnits($bytes)
    {
      $units = array('B', 'KB', 'MB', 'GB', 'TB');
      $i = 0;

      while ($bytes >= 1024 && $i < count($units) - 1) {
        $bytes /= 1024;
        $i++;
      }

      return round($bytes, 2) . ' ' . $units[$i];
    }
    if (isset($deletedData)) : ?>
      <div class="overflow-auto" style="max-height: 500px;">
        <table class="table-borderless table">
          <thead>
            <tr>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tên</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Người đăng</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Ngày đăng</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">File size</th>
              <th class="text-secondary opacity-7"></th>
            </tr>
          </thead>
          <tbody>
            <?php



            foreach ($deletedData as $fileItems) :
              $timestamp = strtotime($fileItems['created_at']);

              // Lấy ngày, tháng, năm từ timestamp
              $day = date('d', $timestamp);
              $month = date('m', $timestamp);
              $year = date('Y', $timestamp);

            ?>
              <tr>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div class="me-3">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                        <path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5" />
                        <path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" />
                      </svg>
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm"><?= $fileItems['file_name'] ?></h6>
                      <!-- <p class="text-xs text-secondary mb-0">john@creative-tim.com</p> -->
                    </div>
                  </div>
                </td>
                <td class="align-middle text-center text-sm">
                  <span class="badge badge-sm">
                    <img width="30px" class="rounded-circle" src="../../../public/assets/img/team-1.jpg" alt="">
                  </span>
                </td>
                <td class="align-middle">
                  <span class="text-secondary text-xs font-weight-bold">
                    <?= $day ?>/<?= $month ?>/<?= $year ?>
                  </span>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold"><?= formatSizeUnits($fileItems['file_size']) ?></span>
                </td>
                <td class="align-middle">
                  <div class="dropdown">
                    <div class="mb-0" id="dropdownAct" data-bs-toggle="dropdown" aria-expanded="false">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                        <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                      </svg>
                    </div>
                    <ul class="dropdown-menu" aria-labelledby="dropdownAct">
                      <form id="formRestore" action="restoreFile" class="dropdown-item" method="post" enctype="multipart/form-data">
                        <input type="text" hidden name="file_id" value="<?= $fileItems['file_id'] ?>">
                        <button class="border-0" type="submit"><i class="bi bi-download me-1"></i><span class="font-weight-bold">Khôi phục</span></button>
                      </form>
                      <!-- <a class="dropdown-item" href="my-file?id=<?= $fileItems['file_id'] ?>"><i class="bi bi-download"></i> <label class="mb-0" for="">Download</label></a> -->
                      <form id="formDelete" action="deleteFile" class="dropdown-item" method="post" enctype="multipart/form-data">
                        <input type="text" hidden name="file_id" value="<?= $fileItems['file_id'] ?>">
                        <button class="border-0" type="submit"> <i class="bi bi-trash me-1"></i><span class="font-weight-bold">Xóa vĩnh viễn</span>
                        </button>
                      </form>
                      <!-- <li><a class="dropdown-item" href="javascript:;">Something else here</a></li> -->
                    </ul>
                  </div>
                </td>
              </tr>
            <?php endforeach;
            ?>
          </tbody>
        </table>
      </div>
    <?php else : ?>
      <div>
        <!-- Thêm nội dung cần cuộn vào đây -->
        <div class="overflow-auto" style="max-height: 500px;">
          <div class="trash mt-5">
            <div class="img-trash d-flex align-items-center justify-content-center">
              <img width="30%" src="<?php __DIR__ ?>/public/assets/img/trash.jpg" alt="">
            </div>
            <h5 class="text-center">Không có tệp nào trong thùng rác</h5>
            <p class="text-center">Di chuyển các tệp bạn không sử dụng vào thùng rác. Các mục này sẽ xóa vĩnh viễn sau 30 ngày.</p>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>

</div>