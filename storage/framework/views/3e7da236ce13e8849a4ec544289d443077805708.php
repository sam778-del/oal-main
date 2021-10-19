<?php $__env->startSection('content'); ?>

<div class="main-container">
    <div class="container-fluid">
        
        <?php echo $__env->make("investor.elements.sidebar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="main-panel">
            <!-- content-wrapper Starts -->
            <div class="content-wrapper">
                <!-- design1 -->
                <div class="col-lg-12 card-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <h4 class="card_title">Pending Funding Investment</h4>
                                </div>
                            </div>

                          

                            <div class="single-table">
                                <div class="table-responsive datatable-primary">
                                    <table id="dataTable2" class="table table-hover progress-table ">
                                        <thead class="text-uppercase">
                                            <tr>
                                                <th>INVESTMENT ID</th>
                                                <th>AMOUNT</th>
                                                <th>COMMENCEMENT DATE</th>
                                                <th>SUBMISSION DATE</th>
                                                <th>STATUS</th>
                                                <th>ACTIONS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $subscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($subscription->investment_name); ?></td>
                                                <td><?php echo e($subscription->amount); ?></td>
                                                <td><?php echo e($subscription->commencement_date ? date('d-M-y', strtotime($subscription->commencement_date))  : ''); ?></td>
                                                <td><?php echo e($subscription->created_at ? date('d-M-y', strtotime($subscription->created_at))  : ''); ?></td>
                                                <td> <span class="badge badge-warning mt-2 mr-2">Pending Funding</span> </td>
                                                <td class="actions">

                                                    <?php 
                                                        if(!empty($subscription['SsDocumentAs'])):
                                                            $documents = getDocument($subscription['SsDocumentAs']);
                                                            foreach ($documents as $document):
                                                    ?>
                                                        <a class="btn btn-sm btn-elevate btn-brand btn-elevate btn-info" href="<?php echo e(asset('storage/'.$document['file'])); ?>" target="_blank" >Open</a>
                                                    <?php 
                                                        endforeach;
                                                    endif; ?> 

                                                    <button type="button" class="btn btn-sm btn-elevate btn-brand btn-elevate btn-danger uploadDocLink" get-sub-id="<?php echo e($subscription->id); ?>" >
                                                         Bank Slip Upload
                                                    </button>
                                                </td> 
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo $__env->make('investor.elements.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>


 <div class="modal fade" id="updatepassportDataModel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="icofont-close-line"></i></button>
            <div class="modal-header">
                <h5 class="modal-title">Upload Bank Slip</h5>
            </div>

            <?php echo Form::open(['url' => '/investor/uploadBankslipSave', 'files' => true, 'id' => 'formBankSlip', 'data-parsley-validate' => 'data-parsley-validate', 'autocomlete'=>"off" ]); ?>


            <div class="modal-body">
                
                <div class="row">
                    
                    <input type="hidden" name="sub_att_id" id="sub_att_id">
                    
                    <div class="col-md-12">
                        <div class="kt-portlet__head-label">
                            <h6 class="kt-portlet__head-title"><br>Bank Slip</h6>
                            <span class="text-danger">Note: Maximum upload file size: 5MB. Supported file type: PDF, JPEG and PNG</span>
                        </div><br><br>
                    </div>
                    
                    <div class="col-md-12 mb-3">
                        <label>Document</label> 
                        <input type="file" class="updateSignDocument" attr-sub_type="11" data-height="300" data-max-file-size="5M" data-allowed-file-extensions="pdf png jpg" data-show-remove="false" required/>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <div class="actions">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
                </div>
            </div>
            </form>
        </div>
    </div>
</div>


<?php 
    
    function getDocument($ssDocumentAs){

        $output = [];
        foreach ($ssDocumentAs as $document) {
                                            
            $id = $document['id'];
            $main_type = $document['main_type'];
            $sub_type = $document['sub_type'];
            $file = $document['file'];
            $name = $document['remarks'];

            if($main_type == 7){
                //*******3********///
                if($sub_type == 71){

                    $output[] = ["id"=> $id, "main_type"=> $main_type,"sub_type"=> $sub_type, "file" => $file, "name" => $name];
                }
            }
        }// For Loop
        return $output;
    }//End Function
?>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">

    $('.uploadDocLink').click(function(e){
        $('#formBankSlip')[0].reset();
        $('#updatepassportDataModel').modal('show');
        
        var source_id = $(this).attr("get-sub-id");
        $("#sub_att_id").val(source_id);
    });


    var drEvent = $('.updateSignDocument').dropify();

    drEvent.on('dropify.beforeClear', function(event, element){
        console.log(element);
        return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
    });

    drEvent.on('dropify.afterClear', function(event, element){
        
        alert('File deleted');
    });

    $('.updateSignDocument').change(function() {
        
        if ($(this).get(0).files.length) {
            var csrfToken = "<?php echo e(csrf_token()); ?>";
            var fd = new FormData();
            var file = $(this)[0].files[0];
    
            fd.append('file', file);
            fd.append('sub_att_id', $("#sub_att_id").val());
    
            axios.post(SITE_URL+'investor/uploadBankslipSave',fd,{
                headers: {
                    'Content-Type': 'multipart/form-data',
                    'X-CSRF-Token': csrfToken}}
            ).then(function(response){
                Swal.fire('Great Job !','You have uploaded Bank Slip successfully, OAL team will verify the Bank Slip!','success');
    
                $('#updatepassportDataModel').modal('hide');
                setTimeout(location.reload.bind(location), 1500);  
    
            })
            .catch(function(){
                $('#updatepassportDataModel').modal('hide');
                Swal.fire('Sorry !','Bank Slip upload faild!','error');
            });
        }
    });


</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/olympus-asset.com/public_html/resources/views/investor/bankslip.blade.php ENDPATH**/ ?>