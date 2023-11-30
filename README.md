### Yetkiler
Roller tenanta bağlıdır fakat yetkiler değildir.
PermissionSeeder.php dosyasında kullanacağınız yetkileri tanımlayabilirsiniz. Aşağıdaki komutu konsolda çalıştırmanız gerekir.
```
php artisan db:seed --class=PermissionSeeder
```

!  Yukardakini yapmak yerine şunu yapmanız önerilir:

view/roles/createModal.blade.php dosyasındaki forma istediğiniz rolu ekleyin örn:
```
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
                                                <label class="form-check-label" for="userManagementWrite"> Kaldır </label>
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
```
Buradaki checkboxların name değerine yetkinizin adını belirleyin. Bu yetkiye sahip herhangi bir rol oluşturulduğunda otomatik olarak yetki veritabanına eklenecektir.

### Global Tenant Scope
Roller ve kullanıcılarda tenant global scope uygulanmıyor. Bu iki model 
dışındaki tüm modellerde herhangi bir sorgu çalıştırıldığı zaman tenant_id koşulu scope ile otomatik ekleniyor.
Bir sorguda tenant_id koşulunu kaldırmak için aşağıdaki şekilde sorgularınızı düzenlemeniz gerekir.
```
Model::withoutGlobalScope(TenantScope::class)->get();
```
