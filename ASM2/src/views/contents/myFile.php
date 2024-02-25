<!-- Button trigger modal -->
<!-- <button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  New folder
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">File upload</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="uploadForm" method="post" class="" enctype="multipart/form-data">
        <div class="modal-body">

          <!-- <label for="upload" class="mb-0 ms-0" tabindex="0">
            <i class="bi bi-file-earmark-arrow-up me-2"></i>
            <span>File upload</span>
          </label> -->

          <div class="form-group mb-0">
            <input type="file" name="files[]" id="upload" class="account-file-input form-control" multiple />
            <div class="form-message text-danger"></div>
          </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Hủy</button>
          <button type="submit" class="btn bg-gradient-primary">Tải lên</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- end modal  -->

<div class="col-md-12">
  <div class="filter d-flex align-items-center">
    <div class="dropdown">
      <button class="btn ps-3 mb-0 " type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
        <h5 class="m-0 dropdown-toggle">My File </h5>
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <li class="">
          <a class="dropdown-item" href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="bi bi-file-earmark-arrow-up me-2"></i>
            <span class="font-weight-bold">Upload files</span>
          </a>
        </li>
        <!-- <li>
          <form action="" class="" enctype="multipart/form-data">
            <a class="dropdown-item" href="javascript:;">
              <label for="upload" class="mb-0 ms-0" tabindex="0">
                <i class="bi bi-file-earmark-arrow-up me-2"></i>
                <span>File upload</span>
                <input type="file" id="upload" class="account-file-input" hidden multiple />
              </label>
            </a>
          </form>
        </li> -->
        <!-- <li><a class="dropdown-item" href="javascript:;">Something else here</a></li> -->
      </ul>
    </div>
    <!-- <div class="input-group rounded-pill">
            <a class="btn mb-0">Files</a>
            <a class="btn mb-0"> Folders</a>
        </div> -->
  </div>
  <div class="mt-3 pt-0">
    <div>
      <!-- Thêm nội dung cần cuộn vào đây -->
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
            <?php foreach ($dataFile as $fileItems) : ?>
              <?php
              $timestamp = strtotime($fileItems['created_at']);

              // Lấy ngày, tháng, năm từ timestamp
              $day = date('d', $timestamp);
              $month = date('m', $timestamp);
              $year = date('Y', $timestamp);

              $full_filename = $fileItems['file_name'];
              $newFull_filename = explode(".", $full_filename);

              $file_name = $newFull_filename[0];
              $file_ex = $newFull_filename[1];
              ?>
              <tr>
                <td>
                  <div class="d-flex px-2 py-1" id-data="<?= $fileItems['file_id'] ?>">
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
                    <img width="30px" class="rounded-circle" src="<?php __DIR__?>/public/assets/img/no-img-user.png" alt="">
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
                      <form id="formDownload" action="downloadFile" class="dropdown-item" method="post" enctype="multipart/form-data">
                        <input type="text" hidden name="file_name" value="<?= $fileItems['file_name'] ?>">
                        <input type="text" hidden name="file_id" value="<?= $fileItems['file_id'] ?>">
                        <button class="border-0" type="submit"><i class="bi bi-download me-2"></i><span class="font-weight-bold">Tải xuống</span></button>
                      </form>
                      <!-- <a class="dropdown-item" href="my-file?id=<?= $fileItems['file_id'] ?>"><i class="bi bi-download"></i> <label class="mb-0" for="">Download</label></a> -->
                      <form id="formRemove" action="moveToBin" class="dropdown-item" method="post" enctype="multipart/form-data">
                        <div class="form-group m-0">
                          <input type="text" hidden name="file_id" value="<?= $fileItems['file_id'] ?>">
                          <div class="form-message"></div>
                        </div>
                        <button class="border-0" type="submit" > <i class="bi bi-trash me-2"></i><span class="font-weight-bold">Thùng rác</span>
                        </button>
                      </form>
                      <li class="dropdown-item">
                        <button class="border-0 btn-rename font-weight-bold" data-id="<?= $fileItems['file_id'] ?>" data-bs-toggle="modal" data-bs-target="#modalRename_<?= $fileItems['file_id'] ?>"><i class="bi bi-pencil-square me-2"></i>Rename</button>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>
              <!-- modal rename -->

              <div class="modal fade" id="modalRename_<?= $fileItems['file_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalRenameLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalRenameLabel">Rename</h5>
                      <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form method="post" action="renameFile" id="formRe_<?= $fileItems['file_id'] ?>" enctype="multipart/form-data">
                      <div class="modal-body">
                        <div class="form-group mb-0">
                          <input type="text" hidden name="file_id" value="<?= $fileItems['file_id'] ?>">
                          <input type="text" hidden name="old_file_name" value="<?= $fileItems['file_name'] ?>">
                          <input type="text" hidden name="file_ex" value="<?= $file_ex ?>">
                          <input type="text" name="file_name_<?= $fileItems['file_id'] ?>" id="file_name" value="<?= $file_name ?>" class="account-file-input form-control ">
                          <div class="mess form-message text-danger"></div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn bg-gradient-primary">Ok</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

            <?php endforeach;
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
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>