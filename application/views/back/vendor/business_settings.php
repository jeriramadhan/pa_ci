<div id="content-container"> 
    <div id="page-title">
        <h1 class="page-header text-overflow"><?php echo translate('manage_payment_receiving_settings');?></h1>
    </div>
    <div class="tab-base">
        <div class="tab-base tab-stacked-left">
        <?php
			$paypal    = $this->db->get_where('vendor', array(
				'vendor_id' => $this->session->userdata('vendor_id')
			))->row()->paypal_email;
			$paypal_set    = $this->db->get_where('vendor', array(
				'vendor_id' => $this->session->userdata('vendor_id')
			))->row()->paypal_set;
			$cash_set    = $this->db->get_where('vendor', array(
				'vendor_id' => $this->session->userdata('vendor_id')
			))->row()->cash_set;
			$stripe_set    = $this->db->get_where('vendor', array(
				'vendor_id' => $this->session->userdata('vendor_id')
			))->row()->stripe_set;
			$stripe_details    = json_decode($this->db->get_where('vendor', array(
				'vendor_id' => $this->session->userdata('vendor_id')
			))->row()->stripe_details,true);
			$stripe_publishable = $stripe_details['publishable'];
			$stripe_secret =  $stripe_details['secret'];
			$c2_set =  $this->db->get_where('vendor', array('vendor_id' => $this->session->userdata('vendor_id')))->row()->c2_set;
            $c2_user =  $this->db->get_where('vendor', array('vendor_id' => $this->session->userdata('vendor_id')))->row()->c2_user;
            $c2_secret =  $this->db->get_where('vendor', array('vendor_id' => $this->session->userdata('vendor_id')))->row()->c2_secret;
            $vp_set =  $this->db->get_where('vendor', array('vendor_id' => $this->session->userdata('vendor_id')))->row()->vp_set;
            $vp_merchant_id =  $this->db->get_where('vendor', array('vendor_id' => $this->session->userdata('vendor_id')))->row()->vp_merchant_id;
            $pum_merchant_key= $this->db->get_where('vendor', array(
                'vendor_id' => $this->session->userdata('vendor_id')
            ))->row()->pum_merchant_key;
            $pum_merchant_salt= $this->db->get_where('vendor', array(
                'vendor_id' => $this->session->userdata('vendor_id')
            ))->row()->pum_merchant_salt;
            $pum_set    = $this->db->get_where('vendor', array(
                'vendor_id' => $this->session->userdata('vendor_id')
            ))->row()->pum_set;

            $bitcoin_set    = $this->db->get_where('vendor', array(
                'vendor_id' => $this->session->userdata('vendor_id')
            ))->row()->bitcoin_set;

            $bitcoin_coinpayments_merchant= $this->db->get_where('vendor', array(
                'vendor_id' => $this->session->userdata('vendor_id')
            ))->row()->bitcoin_coinpayments_merchant;
        ?>
            <div class="col-sm-12">
            <div class="panel panel-bordered-dark">
                <?php
                    echo form_open(base_url() . 'vendor/business_settings/set/', array(
                        'class'     => 'form-horizontal',
                        'method'    => 'post',
                        'id'        => 'gen_set',
                        'enctype'   => 'multipart/form-data'
                    ));
                ?>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="demo-hor-inputemail"><?php echo translate('cash_payment');?></label>
                            <div class="col-sm-6">
                                <div class="col-sm-">
                                    <input id="cash_set" class='sw7' data-set='cash_set' type="checkbox" <?php if($cash_set == 'ok'){ ?>checked<?php } ?> />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="demo-hor-inputemail"><?php echo translate('paypal_payment');?></label>
                            <div class="col-sm-6">
                                <div class="col-sm-">
                                    <input id="paypal_set" class='sw8' data-set='paypal_set' type="checkbox" <?php if($paypal_set == 'ok'){ ?>checked<?php } ?> />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo translate('paypal_email');?></label>
                            <div class="col-sm-6">
                                <input type="text" name="paypal_email" value="<?php echo $paypal; ?>" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="demo-hor-inputemail"><?php echo translate('stripe_payment');?></label>
                            <div class="col-sm-6">
                                <div class="col-sm-">
                                    <input id="stripe_set" class='sw7' data-set='stripe_set' type="checkbox" <?php if($stripe_set == 'ok'){ ?>checked<?php } ?> />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo translate('stripe_secret_key');?></label>
                            <div class="col-sm-6">
                                <input type="text" name="stripe_secret" value="<?php echo $stripe_secret; ?>" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo translate('stripe_publishable_key');?></label>
                            <div class="col-sm-6">
                                <input type="text" name="stripe_publishable" value="<?php echo $stripe_publishable; ?>" class="form-control">
                            </div>
                        </div>
                    	<div class="form-group">
                            <label class="col-sm-3 control-label" for="demo-hor-inputemail">
                                <?php echo translate('twocheckcout_payment');?>
                            </label>
                            <div class="col-sm-6">
                                <div class="col-sm-">
                                    <input id="c2_set" class='sw9' data-set='c2_set' type="checkbox" <?php if($c2_set == 'ok'){ ?>checked<?php } ?> />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo translate('twocheckcout_user');?></label>
                            <div class="col-sm-6">
                                <input type="text" name="c2_user" value="<?php echo $c2_user; ?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo translate('twocheckout_secret');?></label>
                            <div class="col-sm-6">
                                <input type="text" name="c2_secret" value="<?php echo $c2_secret; ?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="demo-hor-inputemail">
                                <?php echo translate('voguePay_payment');?>
                            </label>
                            <div class="col-sm-6">
                                <div class="col-sm-">
                                    <input id="vp_set" class='sw10' data-set='vp_set' type="checkbox" <?php if($vp_set == 'ok'){ ?>checked<?php } ?> />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="demo-hor-inputemail">
                                <?php echo translate('merchant_id');?>
                            </label>
                            <div class="col-sm-6">
                                <div class="col-sm-">
                                    <input type="text" class="form-control" name="vp_merchant_id" value="<?php echo $vp_merchant_id;?>" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="demo-hor-inputemail">
                                <?php echo translate('payUmoney_payment');?>
                            </label>
                            <div class="col-sm-6">
                                <div class="col-sm-">
                                    <input id="pum_set" class='sw10' data-set='pum_set' type="checkbox" <?php if($pum_set == 'ok'){ ?>checked<?php } ?> />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="demo-hor-inputemail">
                                <?php echo translate('payUmoney_merchant_key');?>
                            </label>
                            <div class="col-sm-6">
                                <div class="col-sm-">
                                    <input type="text" class="form-control" name="pum_merchant_key" value="<?php echo $pum_merchant_key;?>" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="demo-hor-inputemail">
                                <?php echo translate('payUmoney_merchant_salt');?>
                            </label>
                            <div class="col-sm-6">
                                <div class="col-sm-">
                                    <input type="text" class="form-control" name="pum_merchant_salt" value="<?php echo $pum_merchant_salt;?>" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="demo-hor-inputemail">
                                <?php echo translate('Bitcoin Payment');?>
                            </label>
                            <div class="col-sm-6">
                                <div class="col-sm-">
                                    <input id="bitcoin_set" class='sw10' data-set='bitcoin_set' type="checkbox" <?php if($bitcoin_set == 'ok'){ ?>checked<?php } ?> />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="demo-hor-inputemail">
                                <?php echo translate('Bitcoin coinpayments merchant');?>
                            </label>
                            <div class="col-sm-6">
                                <div class="col-sm-">
                                    <input type="text" class="form-control" name="bitcoin_coinpayments_merchant" value="<?php echo $bitcoin_coinpayments_merchant;?>" />
                                </div>
                            </div>
                        </div>
                    <div class="panel-footer text-right">
                        <span class="btn btn-info submitter enterer" 
                            data-ing='<?php echo translate('saving'); ?>' data-msg='<?php echo translate('settings_updated!'); ?>' >
                                <?php echo translate('save');?>
                        </span>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>

</div>
<div style="display:none;" id="business"></div>
<script>
	var base_url = '<?php echo base_url(); ?>';
	var user_type = 'vendor';
	var module = 'business_settings';
	var list_cont_func = 'show_all';
	//var dlt_cont_func = 'delete_logo';

    function get_membership_info(id){
        $('#mem_info').load('<?php echo base_url(); ?>vendor/business_settings/membership_info/'+id);
    }

</script>
<script src="<?php echo base_url(); ?>template/back/js/custom/business.js"></script>
