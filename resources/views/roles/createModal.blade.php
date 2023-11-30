<div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-dialog-centered modal-add-new-role">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-4">
                    <h3 class="role-title">Yeni rol ekle</h3>
                    <p>Rol yetkilerini ayarlayın</p>
                </div>
                <!-- Add role form -->
                <form id="addRoleForm" class="row g-3" method="POST" action="{{route('role.store')}}">
                    @csrf
                    <div class="col-12 mb-4">
                        <label class="form-label" for="modalRoleName">Rol adı</label>
                        <input
                            type="text"
                            id="modalRoleName"
                            name="name"
                            class="form-control"
                            placeholder="Rol adı girin.."
                            tabindex="-1"
                        />
                    </div>
                    <div class="col-12">
                        <h4>Rolün yetkileri</h4>
                        <!-- Permission table -->
                        <div class="table-responsive">
                            <table class="table table-flush-spacing">
                                <tbody>
                                <tr>
                                    <td class="text-nowrap fw-semibold">
                                        Yetkiler
                                        <i
                                            class="bx bx-info-circle bx-xs"
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="top"
                                            title="Kutucukları işaretleyerek role yetki verin.."
                                        ></i>
                                    </td>
                                    <td>
                                        <!-- emopty for select all -->
                                    </td>
                                <tr>
                                    <td class="text-nowrap fw-semibold">Role Yönetimi</td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="form-check me-3 me-lg-3">
                                                <input class="form-check-input" type="checkbox" id="userManagementRead" name="view_roles"/>
                                                <label class="form-check-label" for="userManagementRead"> Görüntüle </label>
                                            </div>
                                            <div class="form-check me-3 me-lg-3">
                                                <input class="form-check-input" type="checkbox" id="userManagementWrite" name="create_roles"/>
                                                <label class="form-check-label" for="userManagementWrite"> Oluştur </label>
                                            </div>
                                            <div class="form-check  me-3 me-lg-3">
                                                <input class="form-check-input" type="checkbox" id="userManagementEdit" name="edit_roles"/>
                                                <label class="form-check-label" for="userManagementEdit"> Düzenle </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="userManagementCreate" name="delete_roles"/>
                                                <label class="form-check-label" for="userManagementCreate"> Sil </label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Permission table -->
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1">Kaydet</button>
                        <button
                            type="reset"
                            class="btn btn-label-secondary"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        >
                            Vazgeç
                        </button>
                    </div>
                </form>
                <!--/ Add role form -->
            </div>
        </div>
    </div>
</div>
