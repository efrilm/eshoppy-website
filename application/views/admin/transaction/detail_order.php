 <div class="container-fluid">
     <div class="row">
         <div class="col">
             <div class="page-description">
                 <div class="float-start">
                     <h1><?= elang('Order Detail') ?></h1>
                 </div>
                 <div class="float-end">
                     <?php if ($trans->status_payment == 0) { ?>
                         <span class="badge badge-danger"><?= elang('Not yet paid') ?></span>
                     <?php } else { ?>
                         <span class="badge badge-primary"><?= elang('Already paid') ?></span>
                     <?php } ?>
                     <?php if ($trans->status_order == 0) { ?>
                     <?php } else if ($trans->status_order == 1) { ?>
                         <span class="badge badge-success"><?= elang('Being processed') ?></span>
                     <?php } else if ($trans->status_order == 2) { ?>
                         <span class="badge badge-success"><?= elang('On Delivery') ?></span>
                     <?php } else if ($trans->status_order == 3) { ?>
                         <span class="badge badge-success"><?= elang('Finished') ?></span>
                     <?php } ?>
                 </div>
             </div>
         </div>
     </div>
     <?= $this->session->flashdata('message');  ?>
     <div class="row">
         <div class="col-md-9">
             <div class="card">
                 <div class="card-header">
                     <h5 class="card-title"><?= elang('Product Data') ?></h5>
                 </div>
                 <div class="card-body">
                     <table id="datatable1" class="display" style="width:100%">
                         <thead>
                             <tr>
                                 <th>No.</th>
                                 <th><?= elang("Product Name") ?></th>
                                 <th><?= elang('Product Price') ?></th>
                                 <th><?= elang('Quantity') ?></th>
                                 <th><?= elang('Weight') ?></th>
                                 <th><?= elang('Total') ?></th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php
                                $no = 1;
                                $subweight = 0;
                                $total = 0;
                                foreach ($detail as $d) {
                                    $subweight = $d->qty * $d->product_weight;
                                    $total = $d->qty * $d->product_price;
                                ?>
                                 <tr>
                                     <td><?= $no++ ?></td>
                                     <td><?= $d->product_name ?></td>
                                     <td>IDR <?= number_format($d->product_price) ?></td>
                                     <td><?= $d->qty ?></td>
                                     <td><?= $subweight ?></td>
                                     <td>IDR <?= number_format($total) ?></td>
                                 </tr>
                             <?php } ?>
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
         <div class="col-md-3">
             <?php if (!empty($trans->no_resi)) { ?>
                 <div class="card">
                     <ul class="list-group list-group-flush">
                         <li class="list-group-item">
                             <div class="float-start">
                                 <?= elang('No. Resi') ?>
                             </div>
                             <div class="float-end">
                                 <?= $trans->no_resi ?>
                             </div>
                         </li>
                     </ul>
                 </div>
             <?php } ?>
             <div class="card">
                 <ul class="list-group list-group-flush">
                     <li class="list-group-item">
                         <div class="float-start">
                             <?= elang('Order Date') ?>
                         </div>
                         <div class="float-end">
                             <?= $trans->date_order ?> <?= $trans->time_order ?>
                         </div>
                     </li>
                     <?php if (!empty($trans->update_date) || !empty($trans->update_time)) { ?>
                         <li class="list-group-item">
                             <div class="float-start">
                                 <?= elang('Update Date') ?>
                             </div>
                             <div class="float-end">
                                 <?= $trans->update_date ?> <?= $trans->update_time ?>
                             </div>
                         </li>
                     <?php } ?>
                 </ul>
             </div>
             <div class="card widget widget-list">
                 <div class="card-header">
                     <h5 class="card-title"><?= elang('Action') ?></h5>
                 </div>
                 <div class="card-body">
                     <span class="text-muted m-b-xs d-block"><?= elang('showing 3 featured') ?>.</span>
                     <?php if ($trans->status_payment == 0) { ?>
                         <button type="button" class="btn btn-primary w-100 " data-bs-toggle="modal" data-bs-target="#confirm<?= $trans->no_order  ?>">
                             <?= elang('Confirm Payment') ?>
                         </button>
                     <?php }     ?>
                     <a href="<?= base_url('admin/transaction/invoice/' . $trans->no_order) ?>" class="btn btn-primary w-100 mt-3"><?= elang('Invoice') ?></a href="<?= base_url('admin/transaction/') ?>">
                     <button class="btn btn-danger w-100 mt-3"><?= elang('Cancel') ?></button>
                 </div>
             </div>

         </div>
     </div>
     <div class="row">
         <div class="col-md-4">
             <div class="card">
                 <div class="card-header">
                     <?= elang('Customer Detail') ?>
                 </div>
                 <?php $user = $this->user_model->getUserById($trans->user_id);  ?>
                 <ul class="list-group list-group-flush">
                     <li class="list-group-item">
                         <div class="float-start">
                             <?= elang('Full Name') ?>
                         </div>
                         <div class="float-end">
                             <?= $user->first_name ?> <?= $user->last_name ?>
                         </div>
                     </li>
                     <li class="list-group-item">
                         <div class="float-start">
                             <?= elang('Email') ?>
                         </div>
                         <div class="float-end">
                             <?= $user->email ?>
                         </div>
                     </li>
                 </ul>
             </div>
         </div>
         <div class="col-md-4">
             <div class="card">
                 <div class="card-header">
                     <?= elang('Recipient') ?>
                 </div>
                 <ul class="list-group list-group-flush">
                     <li class="list-group-item">
                         <div class="float-start">
                             <?= elang('Recipient Name') ?>
                         </div>
                         <div class="float-end">
                             <?= $trans->recipient_name ?>
                         </div>
                     </li>
                     <li class="list-group-item">
                         <div class="float-start">
                             <?= elang('No. Phone') ?>
                         </div>
                         <div class="float-end">
                             <?= $trans->no_phone ?>
                         </div>
                     </li>
                 </ul>
             </div>
         </div>
         <div class="col-md-4">
             <div class="card">
                 <div class="card-header">
                     <?= elang('Payment Method') ?>
                 </div>
                 <ul class="list-group list-group-flush">
                     <li class="list-group-item">
                         <div class="float-start">
                             <?= elang('Payment Type') ?>
                         </div>
                         <div class="float-end">
                             <?= $trans->payment_type ?>
                         </div>
                     </li>
                     <?php if ($trans->payment_type == "bank_transfer") { ?>
                         <li class="list-group-item">
                             <div class="float-start">
                                 <?= elang('Bank Name') ?>
                             </div>
                             <div class="float-end">
                                 <?= $trans->id_bank ?>
                             </div>
                         </li>
                     <?php } ?>
                 </ul>
             </div>
         </div>
     </div>
     <div class="row">
         <div class="col-md-4">
             <div class="card">
                 <div class="card-header">
                     <?= elang('Shipping') ?>
                 </div>
                 <ul class="list-group list-group-flush">
                     <li class="list-group-item">
                         <div class="float-start">
                             <?= elang('Shipping') ?>
                         </div>
                         <div class="float-end">
                             <?= $trans->shipping ?>
                         </div>
                     </li>
                     <li class="list-group-item">
                         <div class="float-start">
                             <?= elang('Package') ?>
                         </div>
                         <div class="float-end">
                             <?= $trans->package ?>
                         </div>
                     </li>
                     <li class="list-group-item">
                         <div class="float-start">
                             <?= elang('Estimation') ?>
                         </div>
                         <div class="float-end">
                             <?= $trans->estimation ?> <?= elang('Day') ?>
                         </div>
                     </li>
                     <li class="list-group-item">
                         <div class="float-start">
                             <?= elang('Weight') ?>
                         </div>
                         <div class="float-end">
                             <?= $trans->weight ?> <?= elang('Gr') ?>
                         </div>
                     </li>
                 </ul>
             </div>
         </div>
         <div class="col-md-4">
             <div class="card">
                 <div class="card-header">
                     <?= elang('Shipping Address') ?>
                 </div>
                 <ul class="list-group list-group-flush">
                     <li class="list-group-item">
                         <div class="float-start">
                             <?= elang('Province') ?>
                         </div>
                         <div class="float-end">
                             <?= $trans->province ?>
                         </div>
                     </li>
                     <li class="list-group-item">
                         <div class="float-start">
                             <?= elang('City') ?>
                         </div>
                         <div class="float-end">
                             <?= $trans->city ?>
                         </div>
                     </li>
                     <li class="list-group-item">
                         <div class="float-start">
                             <?= elang('Postal Code') ?>
                         </div>
                         <div class="float-end">
                             <?= $trans->postal_code ?>
                         </div>
                     </li>
                     <li class="list-group-item">
                         <div class="float-start">
                             <?= elang('Address') ?>
                         </div>
                         <div class="float-end">
                             <?= $trans->address ?>
                         </div>
                     </li>
                 </ul>
             </div>
         </div>
         <div class="col-md-4">
             <div class="card">
                 <div class="card-header">
                     <?= elang('Cost') ?>
                 </div>
                 <ul class="list-group list-group-flush">
                     <li class="list-group-item">
                         <div class="float-start">
                             <?= elang('Date') ?>
                         </div>
                         <div class="float-end">
                             <?= $trans->date_order ?> <?= $trans->time_order ?>
                         </div>
                     </li>
                     <li class="list-group-item">
                         <div class="float-start">
                             <?= elang('Shipping Cost') ?>
                         </div>
                         <div class="float-end">
                             IDR <?= number_format($trans->shipping_cost) ?>
                         </div>
                     </li>
                     <li class="list-group-item">
                         <div class="float-start">
                             <?= elang('Subtotal') ?>
                         </div>
                         <div class="float-end">
                             IDR <?= number_format($trans->grand_total) ?>
                         </div>
                     </li>
                     <li class="list-group-item">
                         <div class="float-start">
                             <?= elang('Total Payment') ?>
                         </div>
                         <div class="float-end">
                             <b>IDR <?= number_format($trans->total_payment) ?> </b>
                         </div>
                     </li>
                 </ul>
             </div>
         </div>
     </div>
 </div>

 <div class="modal fade" id="confirm<?= $trans->no_order ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel"><?= elang('Confirm Payment') ?> #<?= $trans->no_order ?></h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <?= elang('Are you sure') ?> ?
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= elang('Cancel') ?></button>
                 <a href="<?= base_url('admin/transaction/confirmPayment/' . $trans->no_order) ?>" class="btn btn-primary"><?= elang('Yes') ?></a>
             </div>
         </div>
     </div>
 </div>