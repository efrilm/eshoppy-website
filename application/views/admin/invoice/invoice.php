          <div class="container">
              <div class="row">
                  <div class="col">
                      <div class="card invoice">
                          <div class="card-body">
                              <div class="invoice-header">
                                  <div class="row">
                                      <div class="col-9">
                                          <h3><?= elang('Invoice') ?></h3>
                                      </div>
                                      <div class="col-3">
                                          <span class="invoice-issue-date"><?= elang('Date') ?>: <?= $trans->date_order ?></span>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="table-responsive">
                                      <table class="table invoice-table">
                                          <thead>
                                              <tr>
                                                  <th scope="col">No.</th>
                                                  <th scope="col"><?= elang('Product Name') ?></th>
                                                  <th scope="col"><?= elang('Recipient Name') ?></th>
                                                  <th scope="col"><?= elang("Quantity") ?></th>
                                                  <th scope="col"><?= elang('Weight') ?></th>
                                                  <th scope="col"><?= elang('Total') ?></th>
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
                                                      <th scope="row"><?= $no++ ?></th>
                                                      <td><?= $d->product_name ?></td>
                                                      <td><?= $d->recipient_name ?></td>
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
                          <div class="card-footer">
                              <div class="row invoice-summary">
                                  <div class="col-lg-4">
                                      <div class="invoice-info">
                                          <p>Invoice Number: <span><?= rand() ?></span></p>
                                          <p>Order ID: <span><?= $trans->no_order ?></span></p>
                                          <p><?= elang('Issue Date') ?>: <span><?= $trans->date_order ?></span></p>
                                          <p><?= elang('Due Date') ?>: <span><?= $trans->date_order ?></span></p>
                                          <div class="invoice-info-actions">
                                              <a href="#" class="btn btn-info m-r-xs" type="button"><?= elang('Print Invoice') ?></a>
                                              <a href="#" class="btn btn-success m-l-xs" type="button"><?= elang('Download') ?></a>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-lg-5"></div>
                                  <div class="col-lg-3">
                                      <div class="invoice-info">
                                          <p><?= elang('Total Weight') ?> <span><?= $trans->weight ?> Gr</span></p>
                                          <p><?= elang('Subtotal') ?> <span>IDR <?= number_format($trans->grand_total) ?></span></p>
                                          <p><?= elang('Shipping Cost') ?> <span>IDR <?= number_format($trans->shipping_cost) ?></span></p>
                                          <p class="bold"><?= elang('Total') ?> <span>IDR <?= number_format($trans->total_payment) ?></span></p>

                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>