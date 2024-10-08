<div class="row mb-3">
	<div class="col bg-info shadow-sm p-3">
		<div class="d-flex align-items-center">
			<span class="text-white">
				<i class="bi bi-receipt"></i> Purchase Invoice Form
			</span>
			<a href="<?php echo base_url();?>" class="btn btn-secondary ms-auto"><i class="bi bi-arrow-bar-left"></i> Back to Home</a>
		</div>
	</div>
</div>
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="createinvoice-tab" data-bs-toggle="tab" data-bs-target="#createinvoice" type="button" role="tab" aria-controls="createinvoice" aria-selected="true">Purchase Invoice</button>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" href="<?= base_url();?>create_transaction/account_payable">Close Invoice / Account Payable Payment </a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active p-3 bg-white border" id="createinvoice" role="tabpanel" aria-labelledby="createinvoice-tab">
	<!-- <form> -->
		<div class="row g-2">
			<div class="col-sm-6 col-md-4 col-lg-3" style="min-height:58px;">
				<select class="selectpicker form-control h-100 border mod-height-form-floating bg-white shadow-sm" id="vendor" name="vendor" data-live-search="true" data-size="8" autofocus>
				    <option>Vendor Name</option>
					<?php
						foreach ($data_vendor->result() as $x) {
					?>
						<option value="<?= $x->id_vendor?>" data-subtext="<?= $x->alias?>" data-token="<?= $x->id_vendor?>"><?= $x->vendor?></option>
					<?php
						}
					?>				
				</select>
			</div>
			<div class="col-sm-6 col-md-4 col-lg-3">
				<div class="form-floating">
					<input type="text" class="form-control shadow-sm" id="no_inv" name="no_inv" placeholder="Nomor Invoice">
					<label for="no_inv">Purchase Number</label>
				</div>
			</div>
			<div class="col-sm-6 col-md-4 col-lg-3">
				<div class="form-floating">
					<select class="form-select bg-white shadow-sm" id="no_po" name="no_po" required="" autofocus>
					    <option>PO Number</option>
					</select>
					<label for="no_po">PO Number</label>
				</div>
			</div>
			<div class="col-sm-6 col-md-4 col-lg-3">
				<div class="form-floating">
					<input type="date" class="form-control shadow-sm" id="tgl_input" name="tgl_input"  placeholder="Tanggal Input" required="">
					<label for="tgl_input">Invoice Date</label>
				</div>
			</div>			
			<div class="col-sm-6 col-md-4 col-lg-3">
				<div class="form-floating">
					<input type="text" id="tax_number" class="form-control shadow-sm" placeholder="Tax Number" required="">
					<label for="">Tax Number</label>
				</div>
			</div>
			<div class="col-sm-6 col-md-4 col-lg-3">
				<div class="form-floating">
					<input type="date" class="form-control shadow-sm" id="tax_date" name="tax_date"  placeholder="Tax Date" required="">
					<label for="">Tax Date</label>
				</div>
			</div>			
			<div class="col-sm-6 col-md-4 col-lg-3">
				<div class="form-floating">
					<input type="text" class="form-control shadow-sm" id="department_kosong" name="department_kosong" placeholder="Department" readonly="">
					<input type="text" class="d-none form-control shadow-sm" id="department_name" name="department_name" placeholder="Department" readonly="">
					<input type="hidden" class="form-control shadow-sm" id="department" name="department" placeholder="Department">
					<label for="department">Department</label>
				</div>
			</div>	
			<div class="col-sm-6 col-md-4 col-lg-3">
				<div class="form-floating">
					<input type="text" class="form-control shadow-sm" id="project_kosong" name="project_kosong" placeholder="Project" readonly="">
					<input type="text" class="d-none form-control shadow-sm" id="project_name" name="project_name" placeholder="Project" readonly="">
					<input type="hidden" class="form-control shadow-sm" id="project" name="project" placeholder="Project">
					<label for="project">Project</label>
				</div>
			</div>
			<div class="col-sm-6 col-md-4 col-lg-3">
				<div class="form-floating">
					<select class="form-control bg-white shadow-sm" id="down_payment" name="down_payment" data-live-search="true" data-size="8"  required="" autofocus>
						<option>- Pilih Down Payment -</option>
					</select>
					<label for="down_payment">Down Payment</label>
					<input type="hidden" id="nilai_dp" name="nilai_dp" readonly>
					<input type="hidden" id="jumlah_detail" name="jumlah_detail" readonly>
				</div>
			</div>	
			<div class="col-12">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item" role="presentation">
						<button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Order Description</button>
					</li>
				</ul>
				<div class="tab-content shadow-sm" id="myTabContent">
					<div class="tab-pane fade show active p-3 bg-white border border-top-0" id="home" role="tabpanel" aria-labelledby="home-tab">
						<div class="table-responsive">
							<table class="table table-bordered table-sm mb-0" width="100%" cellspacing="0">
								<tbody id="dataDeskripsi">
									<tr class="bg-secondary text-white">
										<th scope="col">#</th>
										<th scope="col">Order&nbsp;Description&nbsp;</th>
										<th scope="col">Code&nbsp;Account</th>
										<th scope="col">Received</th>
										<th scope="col">Unit</th>
										<th scope="col">Unit Price</th>
										<th scope="col">Discount&nbsp;(%)</th>
										<th scope="col">Tax 1</th>
										<th scope="col">Tax 2</th>
										<th scope="col">Total&nbsp;</th>
									</tr>
								</tbody>
								<tr>
									<td colspan="8"></td>
									<td align="right"><b>Total :</b></td>
									<td><button type="button"  class="btn btn-success fw-bold btn-sm w-100" id="total_netto" data-bs-toggle="tooltip" title="Klik untuk cek">Cek Total Netto</button></td>
								</tr>
							</table>					
						</div>
					</div>
				</div>
			</div> 
			<div class="col-sm-6 col-md-4 col-lg-3">
				<div class="form-floating">
					<input type="number" class="form-control shadow-sm" id="term_pembayaran" name="term_pembayaran" placeholder="Term Pembayaran (hari)" required="">
					<label for="term_pembayaran">Payment Terms</label>
				</div>
			</div>
			<div class="col-sm-6 col-md-4 col-lg-3">
				<div class="form-floating">
					<input type="date" class="form-control shadow-sm" id="delivery_date" placeholder="Delivery Date" required="" readonly="">
					<label for="tgl_faktur_pajak">Delivery Date</label>
				</div>
			</div>	
			<div class="col-sm-6 col-md-4 col-lg-3">
				<select class="selectpicker form-control h-100 border mod-height-form-floating bg-white shadow-sm" id="purchasing_dept" name="purchasing_dept" data-live-search="true" data-size="8" autofocus>
				    <option>Purchasing Dept</option>
					<?php
						foreach ($data_procurement->result() as $x) {
					?>
						<option value="<?= $x->payroll_id?>" data-subtext="<?= $x->payroll_id?>" data-token="<?= $x->payroll_id?>"><?= $x->nama_karyawan?></option>
					<?php
						}
					?>				
				</select>
			</div>
			<div class="col-sm-6 col-md-4 col-lg-3 d-grid">
				<div class="input-group">
					<select class="form-select" id="status" aria-label="Example select with button addon" required="">
					    <option value="">Draft or Posting</option>
					    <option value="0">Draft</option>
					    <option value="1">Posting</option>
					</select>
					<button type="submit" class="btn btn-primary" id="simpan">Submit</button>
				</div>
			</div>
		</div>
	<!-- </form> -->
  </div>
</div>

<?php 
 for($i=0;$i<=9;$i++){
?>
<div class="modal fade modalPajak" id="modalPajak<?=$i;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">
					<i class="far fa-list-alt"></i> Pilih Pajak <!--?=$i;?-->
				</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div> 
			<div class="modal-body">
				<div class="row g-2">
					<div class="col-md-12">
						<input type="text" id="cari_pajak_row<?=$i;?>" class="w-100 border border-success mb-2" placeholder="Cari di sini..">
						<div class="table-responsive">
							<table id="dataPajak1" class="table table-hover table-sm" style="width: 100%;">
								<thead>
						            <tr>
						                <th class="d-none">#</th>
						                <th>Id Pajak</th>
						                <th>Kode Pajak</th>
						                <th>Nama Pajak</th>
						                <th>Nilai</th>
						                <th>No. Akun</th>
						                <th>Nama Akun</th>
						                <th>Action</th>
						            </tr>
						        </thead>
								<tbody>
									<?php $no=0; foreach($data_pajak->result_array() as $x): $no++ ?>
									<tr>
										<td class="d-none"><?= $no; ?></td>
										<td><?= $x['id']; ?></td>
										<td><?= $x['kode_pajak']; ?></td>
										<td><?= $x['nama_pajak']; ?></td>
										<td><?= $x['value']; ?></td>
										<td><?= $x['account_number']; ?></td>
										<td><?= $x['account_name']; ?></td>
										<td><button class="btnSelectPajak<?=$i;?> btn btn-success btn-sm">Select</button></td>
									</tr>
									<?php endforeach;?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade modalPajakn" id="modalPajakn<?=$i;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">
					<i class="far fa-list-alt"></i> Pilih Pajak <!--?=$i;?-->
				</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div> 
			<div class="modal-body">
				<div class="row g-2">
					<div class="col-md-12">
						<input type="text" id="cari_pajak_rown<?=$i;?>" class="w-100 border border-success mb-2" placeholder="Cari di sini..">
						<div class="table-responsive">
							<table id="dataPajak2" class="table table-hover table-sm" style="width: 100%;">
								<thead>
						            <tr>
						                <th class="d-none">#</th>
						                <th>Id Pajak</th>
						                <th>Kode Pajak</th>
						                <th>Nama Pajak</th>
						                <th>Nilai</th>
						                <th>No. Akun</th>
						                <th>Nama Akun</th>
						                <th>Action</th>
						            </tr>
						        </thead>
								<tbody>
									<?php $no=0; foreach($data_pajak->result_array() as $x): $no++ ?>
									<tr>
										<td class="d-none"><?= $no; ?></td>
										<td><?= $x['id']; ?></td>
										<td><?= $x['kode_pajak']; ?></td>
										<td><?= $x['nama_pajak']; ?></td>
										<td><?= $x['value']; ?></td>
										<td><?= $x['account_number']; ?></td>
										<td><?= $x['account_name']; ?></td>
										<td><button class="btnSelectPajakn<?=$i;?> btn btn-success btn-sm">Select</button></td>
									</tr>
									<?php endforeach;?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>
<script type="text/javascript">
	var inputTanggal = document.getElementById('tgl_input');
	var tanggalSaatIni = new Date();
	var formattedDate = tanggalSaatIni.toISOString().substr(0, 10);	
	inputTanggal.value = formattedDate;
	$('#vendor').change(function(){		
		$('#department_kosong').removeClass('d-none');
		$('#department_name').addClass('d-none');
		$('#project_kosong').removeClass('d-none');
		$('#project_name').addClass('d-none');
		var vendor_id=$('#vendor').val();
		$.ajax({
			url : "<?php echo base_url();?>create_transaction/getPo",
			method : "POST",
			data : {vendor_id: vendor_id},
			dataType : 'json',
			success: function(data){
				var html = '';
				var dept_id = '';
				var dept_name = '';
				var project_id = '';
				var project_name = '';
				var i;
				for(i=0; i<data.length; i++){					
					html += '<option value="'+data[i].po_id+'" data-subtext="'+data[i].po_date+'" data-token="'+data[i].po_id+'">'+data[i].po_no+'</option>';
					dept_id =data[i].dept_code;
					dept_name =data[i].dept_code+' - '+data[i].dept_name;
					project_id =data[i].id_project;
					project_name =data[i].project_code+' - '+data[i].project;
				}
				$('#no_po').html('<option value="">PO Number</<option>'+html);
				$('#no_po').selectpicker('destroy');
				$('#department').val(dept_id);
				$('#department_name').val(dept_name);
				$('#project').val(project_id);
				$('#project_name').val(project_name);
			}
		});

		
		$.ajax({
			url : "<?php echo base_url();?>create_transaction/getPurchaseAdvance",
			method : "POST",
			data : {vendor_id: vendor_id},
			dataType : 'json',
			success: function(data){				
				var html = '';
				for (var i = 0; i < data.length; i++) {	
					 // Mengubah nilai ke format mata uang
					var formattedValue = parseFloat(data[i].nilai).toLocaleString('id-ID', {
						style: 'currency',
						currency: 'IDR'
					});					
					html += '<option value="'+data[i].id+'" data-subtext="'+data[i].account_desc+'" data-token="'+data[i].id+'">'+data[i].account_desc+' - [ '+formattedValue+' ]</option>';
				}	
					
				$('#down_payment').html('<option value="">- Pilih Down Payment -</<option>'+html);
				$('#down_payment').selectpicker('destroy');
			}
		});
	});

	const selectDp = document.getElementById('down_payment');
	const inputDp = document.getElementById('nilai_dp');

	selectDp.addEventListener('change', function() {
		// inputDp.value = selectDp.options[selectDp.selectedIndex].text;
		const inputDp = selectDp.options[selectDp.selectedIndex].text;
		const matches = inputDp.match(/\[(.*?)\]/); // Mengambil text di dalam tanda kurung
		const cleanedValue = matches ? matches[1].replace(/\D/g, '') : ''; // Menghapus karakter non-digit dari teks di dalam tanda kurung		
		
		inputDp.value = cleanedValue.slice(0, -2);
		$('#nilai_dp').val(cleanedValue.slice(0, -2));
	});

	$('#no_po').change(function(){
		var no_po=$('#no_po').val();
		$('#department_kosong').addClass('d-none');
		$('#department_name').removeClass('d-none');
		$('#project_kosong').addClass('d-none');
		$('#project_name').removeClass('d-none');
		$.ajax({
			url : "<?php echo base_url();?>create_transaction/getPodetail",
			method : "POST",
			data : {no_po: no_po},
			dataType : 'json',
			success: function(data){				
				var html = '';
				var i=0;
				for (i = 0; i < data.length; i++) {
					var formattedDiscountAmount = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(data[i].discount_amount);
					var formattedQty = new Intl.NumberFormat('id-ID').format(data[i].qty);
					var priceInput = document.getElementById('price'+i);
					
					html +=	data[i].unit;					
					html += '<tr><td>' + (i + 1) + '</td><td><input type="text" id="description'+i+'" class="form-control" value="'+data[i].description+'" readonly=""></td>';
					html += ' <td><select id="kode_akun'+i+'" class="code_account form-control form-control-sm border bg-white selectpicker" data-live-search="true" data-size="8" data-container="body"><option>Code Account</option>';
					
					<?php foreach ($data_akun_setting->result() as $x) { ?>
						html += '<option value="<?php echo $x->id_akun; ?>"><?php echo $x->id_akun; ?> <?php echo $x->description; ?></option>';
					<?php } ?>
					html +='</select></td>';
					html +='<td><input type="text" id="received'+i+'" class="form-control" value="'+formattedQty+'">';
					html +='</td><td><input type="text" id="unit'+i+'" class="form-control" value="'+data[i].unit+'" readonly=""></td>';
					html +='<td><input  type="text"  class="form-control" id="price'+i+'" value="'+data[i].price+'"></td>';
					html +='<td><input type="text" class="form-control" value="'+formattedDiscountAmount+'" readonly=""><input type="hidden" id="diskon'+i+'" value="'+data[i].discount_amount+'"></td>';
					html +='<td id="render_pajak'+i+'">';
					html +='<input type="hidden" class="form-control" id="id_pajak'+i+'" name="id_pajak'+i+'">';
					html +='<input type="hidden" class="form-control" id="kode_pajak'+i+'" name="kode_pajak'+i+'" readonly>';
					html +='<div class="input-group input-group-sm" style="min-width:150px!important;max-width:100%!important">';
					html +='<input type="text" class="form-control" id="nilai'+i+'" name="nilai'+i+'" readonly>';
					html +='<input type="text" class="form-control" id="nama_pajak'+i+'" name="nama_pajak'+i+'" readonly>';
					html +='<button class="btn btn-outline-secondary d-none" type="button" id="button-addon-hapus-pajak-'+i+'" data-bs-toggle="tooltip" title="Hapus?"><i class="fas fa-times-circle"></i></button>';
					html +='<button class="btn btn-outline-secondary" type="button" id="button-addon-cari-pajak-'+i+'" data-bs-toggle="modal" data-bs-target="#modalPajak'+i+'"><i class="fas fa-search"></i></button>';
					html +='</div>';
					html +='</td>';
					html +='<td id="render_pajak_dua'+i+'">';
					html +='<input type="hidden" class="form-control" id="id_pajak_dua'+i+'" name="id_pajak_dua'+i+'">';
					html +='<input type="hidden" class="form-control" id="kode_pajak_dua'+i+'" name="kode_pajak_dua'+i+'" readonly>';
					html +='<div class="input-group input-group-sm" style="min-width:150px!important;max-width:100%!important">';
					html +='<input type="text" class="form-control" id="nilai_dua'+i+'" name="nilai_dua'+i+'" readonly>';
					html +='<input type="text" class="form-control" id="nama_pajak_dua'+i+'" name="nama_pajak_dua'+i+'" readonly>';
					html +='<button class="btn btn-outline-secondary d-none" type="button" id="button-addon-hapus-pajak_dua-'+i+'" data-bs-toggle="tooltip" title="Hapus?"><i class="fas fa-times-circle"></i></button>';
					html +='<button class="btn btn-outline-secondary" type="button" id="button-addon-cari-pajak_dua-'+i+'" data-bs-toggle="modal" data-bs-target="#modalPajakn'+i+'"><i class="fas fa-search"></i></button>';
					html +='</div>';
					html +='</td>';

					html +='<td><input type="text" id="subtotal'+i+'" name="subtotal'+i+'" class="form-control" readonly=""></td></tr>';					 					
					$('#delivery_date').val(data[i].lpb_date);
				}
				$('#jumlah_detail').val(data.length);			
				$('#dataDeskripsi').html('<tr class="bg-secondary text-white"><th scope="col">#</th><th scope="col">Order&nbsp;Description&nbsp;</th><th scope="col">Code&nbsp;Account</th><th scope="col">Received</th><th scope="col">Unit</th><th scope="col">Unit Price (Rp.)</th><th scope="col">Discount&nbsp;(%)</th><th scope="col">Tax 1</th><th scope="col">Tax 2</th><th scope="col">Total&nbsp;</th></tr>'+html);
				$('.code_account').selectpicker('render');
			}
		});
	});
	
	$(".btnSelectPajak0").on('click',function(){
		var currentRow=$(this).closest("tr");
		var col1=currentRow.find("td:eq(1)").html();
		var col2=currentRow.find("td:eq(2)").html();
		var col3=currentRow.find("td:eq(3)").html();
		var col4=currentRow.find("td:eq(4)").html();
		var price=$('#price0').val();
		var qty=$('#received0').val();
		var total1=parseInt(price)*parseInt(qty);

		$('#modalPajak0').modal('hide');
		$('#id_pajak0').val(col1);
		$('#kode_pajak0').val(col2);
		$('#nama_pajak0').val(col3);
		$('#nilai0').val(col4);
		
		var pajak1 = $('#nilai0').val();
		var tot_pajak1 = (parseInt(pajak1)*parseInt(total1))/100;
		var netto1 = parseFloat(tot_pajak1)+parseFloat(total1);

		$('#subtotal0').val(netto1.toFixed(2));
		$('#button-addon-hapus-pajak-0').addClass('text-danger');
		$('#button-addon-hapus-pajak-0').removeClass('d-none');
	});
	$('#button-addon-hapus-pajak-0').on('click',function(event) {
		$(this).addClass('d-none');
		$('#id_pajak0').val('');
		$('#kode_pajak0').val('');
		$('#nama_pajak0').val('');
		$('#nilai0').val('');
		$('#subtotal0').val('');
	});
	$(".btnSelectPajak1").on('click',function(){
		var currentRow=$(this).closest("tr");
		var col1=currentRow.find("td:eq(1)").html();
		var col2=currentRow.find("td:eq(2)").html();
		var col3=currentRow.find("td:eq(3)").html();
		var col4=currentRow.find("td:eq(4)").html();
		var price=$('#price1').val();
		var qty=$('#received1').val();
		var total1=parseInt(price)*parseInt(qty);

		$('#modalPajak1').modal('hide');
		$('#id_pajak1').val(col1);
		$('#kode_pajak1').val(col2);
		$('#nama_pajak1').val(col3);
		$('#nilai1').val(col4);
		
		var pajak1 = $('#nilai1').val();
		var tot_pajak1 = (parseInt(pajak1)*parseInt(total1))/100;
		var netto1 = parseFloat(tot_pajak1)+parseFloat(total1);
		
		$('#subtotal1').val(netto1.toFixed(2));
		$('#button-addon-hapus-pajak-1').addClass('text-danger');
		$('#button-addon-hapus-pajak-1').removeClass('d-none');
	});
	$('#button-addon-hapus-pajak-1').on('click',function(event) {
		$(this).addClass('d-none');
		$('#id_pajak1').val('');
		$('#kode_pajak1').val('');
		$('#nama_pajak1').val('');
		$('#nilai1').val('');
		$('#subtotal1').val('');
	});
	$(".btnSelectPajak2").on('click',function(){
		var currentRow=$(this).closest("tr");
		var col1=currentRow.find("td:eq(1)").html();
		var col2=currentRow.find("td:eq(2)").html();
		var col3=currentRow.find("td:eq(3)").html();
		var col4=currentRow.find("td:eq(4)").html();
		var price=$('#price2').val();
		var qty=$('#received2').val();
		var total2=parseInt(price)*parseInt(qty);

		$('#modalPajak2').modal('hide');
		$('#id_pajak2').val(col1);
		$('#kode_pajak2').val(col2);
		$('#nama_pajak2').val(col3);
		$('#nilai2').val(col4);
		var pajak2 = $('#nilai2').val();
		var tot_pajak2 = (parseInt(pajak2)*parseInt(total2))/100;
		var netto2 = parseFloat(tot_pajak2)+parseFloat(total2);
		$('#subtotal2').val(netto2.toFixed(2));
		$('#button-addon-hapus-pajak-2').addClass('text-danger');
		$('#button-addon-hapus-pajak-2').removeClass('d-none');
	});
	$('#button-addon-hapus-pajak-2').on('click',function(event) {
		$(this).addClass('d-none');
		$('#id_pajak2').val('');
		$('#kode_pajak2').val('');
		$('#nama_pajak2').val('');
		$('#nilai2').val('');
		$('#subtotal2').val('');
	});
	$(".btnSelectPajak3").on('click',function(){
		var currentRow=$(this).closest("tr");
		var col1=currentRow.find("td:eq(1)").html();
		var col2=currentRow.find("td:eq(2)").html();
		var col3=currentRow.find("td:eq(3)").html();
		var col4=currentRow.find("td:eq(4)").html();
		var price=$('#price3').val();
		var qty=$('#received3').val();
		var total3=parseInt(price)*parseInt(qty);

		$('#modalPajak3').modal('hide');
		$('#id_pajak3').val(col1);
		$('#kode_pajak3').val(col2);
		$('#nama_pajak3').val(col3);
		$('#nilai3').val(col4);
		var pajak3 = $('#nilai3').val();
		var tot_pajak3 = (parseInt(pajak3)*parseInt(total3))/100;
		var netto3 = parseFloat(tot_pajak3)+parseFloat(total3);
		$('#subtotal3').val(netto3.toFixed(2));
		$('#button-addon-hapus-pajak-3').addClass('text-danger');
		$('#button-addon-hapus-pajak-3').removeClass('d-none');
	});
	$('#button-addon-hapus-pajak-3').on('click',function(event) {
		$(this).addClass('d-none');
		$('#id_pajak3').val('');
		$('#kode_pajak3').val('');
		$('#nama_pajak3').val('');
		$('#nilai3').val('');
		$('#subtotal3').val('');
	});
	$(".btnSelectPajak4").on('click',function(){
		var currentRow=$(this).closest("tr");
		var col1=currentRow.find("td:eq(1)").html();
		var col2=currentRow.find("td:eq(2)").html();
		var col3=currentRow.find("td:eq(3)").html();
		var col4=currentRow.find("td:eq(4)").html();
		var price=$('#price4').val();
		var qty=$('#received4').val();
		var total4=parseInt(price)*parseInt(qty);
		$('#modalPajak4').modal('hide');
		$('#id_pajak4').val(col1);
		$('#kode_pajak4').val(col2);
		$('#nama_pajak4').val(col3);
		$('#nilai4').val(col4);
		var pajak4 = $('#nilai4').val();
		var tot_pajak4 = (parseInt(pajak4)*parseInt(total4))/100;
		var netto4 = parseFloat(tot_pajak4)+parseFloat(total4);
		$('#subtotal4').val(netto4.toFixed(2));
		$('#button-addon-hapus-pajak-4').addClass('text-danger');
		$('#button-addon-hapus-pajak-4').removeClass('d-none');
	});
	$('#button-addon-hapus-pajak-4').on('click',function(event) {
		$(this).addClass('d-none');
		$('#id_pajak4').val('');
		$('#kode_pajak4').val('');
		$('#nama_pajak4').val('');
		$('#nilai4').val('');
		$('#subtotal4').val('');
	});
	$(".btnSelectPajak5").on('click',function(){
		var currentRow=$(this).closest("tr");
		var col1=currentRow.find("td:eq(1)").html();
		var col2=currentRow.find("td:eq(2)").html();
		var col3=currentRow.find("td:eq(3)").html();
		var col4=currentRow.find("td:eq(4)").html();
		var price=$('#price5').val();
		var qty=$('#received5').val();
		var total5=parseInt(price)*parseInt(qty);
		
		$('#modalPajak5').modal('hide');
		$('#id_pajak5').val(col1);
		$('#kode_pajak5').val(col2);
		$('#nama_pajak5').val(col3);
		$('#nilai5').val(col4);

		var pajak5 = $('#nilai5').val();
		var tot_pajak5 = (parseInt(pajak5)*parseInt(total5))/100;
		var netto5 = parseFloat(tot_pajak5)+parseFloat(total5);

		$('#subtotal5').val(netto5.toFixed(2));
		$('#button-addon-hapus-pajak-5').addClass('text-danger');
		$('#button-addon-hapus-pajak-5').removeClass('d-none');
	});
	$('#button-addon-hapus-pajak-5').on('click',function(event) {
		$(this).addClass('d-none');
		$('#id_pajak5').val('');
		$('#kode_pajak5').val('');
		$('#nama_pajak5').val('');
		$('#nilai5').val('');
		$('#subtotal5').val('');
	});
	$(".btnSelectPajak6").on('click',function(){
		var currentRow=$(this).closest("tr");
		var col1=currentRow.find("td:eq(1)").html();
		var col2=currentRow.find("td:eq(2)").html();
		var col3=currentRow.find("td:eq(3)").html();
		var col4=currentRow.find("td:eq(4)").html();
		var price=$('#price6').val();
		var qty=$('#received6').val();
		var total6=parseInt(price)*parseInt(qty);

		$('#modalPajak6').modal('hide');
		$('#id_pajak6').val(col1);
		$('#kode_pajak6').val(col2);
		$('#nama_pajak6').val(col3);
		$('#nilai6').val(col4);
		var pajak6 = $('#nilai6').val();
		var tot_pajak6 = (parseInt(pajak6)*parseInt(total6))/100;
		var netto6 = parseFloat(tot_pajak6)+parseFloat(total6);
		$('#subtotal6').val(netto6.toFixed(2));
		$('#button-addon-hapus-pajak-6').addClass('text-danger');
		$('#button-addon-hapus-pajak-6').removeClass('d-none');
	});
	$('#button-addon-hapus-pajak-6').on('click',function(event) {
		$(this).addClass('d-none');
		$('#id_pajak6').val('');
		$('#kode_pajak6').val('');
		$('#nama_pajak6').val('');
		$('#nilai6').val('');
		$('#subtotal6').val('');
	});
	$(".btnSelectPajak7").on('click',function(){
		var currentRow=$(this).closest("tr");
		var col1=currentRow.find("td:eq(1)").html();
		var col2=currentRow.find("td:eq(2)").html();
		var col3=currentRow.find("td:eq(3)").html();
		var col4=currentRow.find("td:eq(4)").html();
		var price=$('#price7').val();
		var qty=$('#received7').val();
		var total7=parseInt(price)*parseInt(qty);

		$('#modalPajak7').modal('hide');
		$('#id_pajak7').val(col1);
		$('#kode_pajak7').val(col2);
		$('#nama_pajak7').val(col3);
		$('#nilai7').val(col4);
		var pajak7 = $('#nilai7').val();
		var tot_pajak7 = (parseInt(pajak7)*parseInt(total7))/100;
		var netto7 = parseFloat(tot_pajak7)+parseFloat(total7);
		$('#subtotal7').val(netto7.toFixed(2));
		$('#button-addon-hapus-pajak-7').addClass('text-danger');
		$('#button-addon-hapus-pajak-7').removeClass('d-none');
	});
	$('#button-addon-hapus-pajak-7').on('click',function(event) {
		$(this).addClass('d-none');
		$('#id_pajak7').val('');
		$('#kode_pajak7').val('');
		$('#nama_pajak7').val('');
		$('#nilai7').val('');
		$('#subtotal7').val('');
	});
	$(".btnSelectPajak8").on('click',function(){
		var currentRow=$(this).closest("tr");
		var col1=currentRow.find("td:eq(1)").html();
		var col2=currentRow.find("td:eq(2)").html();
		var col3=currentRow.find("td:eq(3)").html();
		var col4=currentRow.find("td:eq(4)").html();
		var price=$('#price8').val();
		var qty=$('#received8').val();
		var total8=parseInt(price)*parseInt(qty);

		$('#modalPajak8').modal('hide');
		$('#id_pajak8').val(col1);
		$('#kode_pajak8').val(col2);
		$('#nama_pajak8').val(col3);
		$('#nilai8').val(col4);
		var pajak8 = $('#nilai8').val();
		var tot_pajak8 = (parseInt(pajak8)*parseInt(total8))/100;
		var netto3 = parseFloat(tot_pajak8)+parseFloat(total8);
		$('#subtotal8').val(netto8.toFixed(2));
		$('#button-addon-hapus-pajak-8').addClass('text-danger');
		$('#button-addon-hapus-pajak-8').removeClass('d-none');
	});
	$('#button-addon-hapus-pajak-8').on('click',function(event) {
		$(this).addClass('d-none');
		$('#id_pajak8').val('');
		$('#kode_pajak8').val('');
		$('#nama_pajak8').val('');
		$('#nilai8').val('');
		$('#subtotal8').val('');
	});

	$(".btnSelectPajakn0").on('click',function(){
		var currentRow=$(this).closest("tr");
		var col1=currentRow.find("td:eq(1)").html();
		var col2=currentRow.find("td:eq(2)").html();
		var col3=currentRow.find("td:eq(3)").html();
		var col4=currentRow.find("td:eq(4)").html();		
		var price=$('#price0').val();
		var qty=$('#received0').val();
		var total0=parseInt(price)*parseInt(qty);
		var subtotal0=$('#subtotal0').val();

		$('#modalPajakn0').modal('hide');
		$('#id_pajak_dua0').val(col1);
		$('#kode_pajak_dua0').val(col2);
		$('#nama_pajak_dua0').val(col3);
		$('#nilai_dua0').val(col4);

		var pajak0 = $('#nilai_dua0').val();
		var tot_pajak0 = (parseInt(pajak0)*parseInt(total0))/100;
		var netto0 = parseFloat(tot_pajak0)+parseFloat(subtotal0);

		$('#subtotal0').val(netto0.toFixed(2));
		$('#button-addon-hapus-pajak-0').addClass('text-danger');
		$('#button-addon-hapus-pajak-0').removeClass('d-none');		
	});
	$('#button-addon-hapus-pajak-0').on('click',function(event) {
		$(this).addClass('d-none');
		$('#id_pajak_dua0').val('');
		$('#kode_pajak_dua0').val('');
		$('#nama_pajak_dua0').val('');
		$('#nilai_dua0').val('');
		$('#subtotal_dua0').val('');
	});
	
	$(".btnSelectPajakn1").on('click',function(){
		var currentRow=$(this).closest("tr");
		var col1=currentRow.find("td:eq(1)").html();
		var col2=currentRow.find("td:eq(2)").html();
		var col3=currentRow.find("td:eq(3)").html();
		var col4=currentRow.find("td:eq(4)").html();
		var price=$('#price1').val();
		var qty=$('#received1').val();
		var total1=parseInt(price)*parseInt(qty);
		var subtotal1=$('#subtotal1').val();

		$('#modalPajakn1').modal('hide');
		$('#id_pajak_dua1').val(col1);
		$('#kode_pajak_dua1').val(col2);
		$('#nama_pajak_dua1').val(col3);
		$('#nilai_dua1').val(col4);

		var pajak1 = $('#nilai_dua1').val();
		var tot_pajak1 = (parseInt(pajak1)*parseInt(total1))/100;
		var netto1 = parseFloat(tot_pajak1)+parseFloat(subtotal1);
		
		$('#subtotal1').val(netto1.toFixed(2));
		$('#button-addon-hapus-pajak-1').addClass('text-danger');
		$('#button-addon-hapus-pajak-1').removeClass('d-none');		
	});
	$('#button-addon-hapus-pajak-1').on('click',function(event) {
		$(this).addClass('d-none');
		$('#id_pajak_dua1').val('');
		$('#kode_pajak_dua1').val('');
		$('#nama_pajak_dua1').val('');
		$('#nilai_dua1').val('');
		$('#subtotal_dua1').val('');
	});
	
	$(".btnSelectPajakn2").on('click',function(){
		var currentRow=$(this).closest("tr");
		var col1=currentRow.find("td:eq(1)").html();
		var col2=currentRow.find("td:eq(2)").html();
		var col3=currentRow.find("td:eq(3)").html();
		var col4=currentRow.find("td:eq(4)").html();
		var price=$('#price2').val();
		var qty=$('#received2').val();
		var total2=parseInt(price)*parseInt(qty);
		var subtotal2=$('#subtotal2').val();

		$('#modalPajakn2').modal('hide');
		$('#id_pajak_dua2').val(col1);
		$('#kode_pajak_dua2').val(col2);
		$('#nama_pajak_dua2').val(col3);
		$('#nilai_dua2').val(col4);

		var pajak2 = $('#nilai_dua2').val();
		var tot_pajak2 = (parseInt(pajak2)*parseInt(total2))/100;
		var netto2 = parseFloat(tot_pajak2)+parseFloat(subtotal2);
		
		$('#subtotal2').val(netto2.toFixed(2));
		$('#button-addon-hapus-pajak-2').addClass('text-danger');
		$('#button-addon-hapus-pajak-2').removeClass('d-none');	
	});
	$('#button-addon-hapus-pajak-2').on('click',function(event) {
		$(this).addClass('d-none');
		$('#id_pajak_dua2').val('');
		$('#kode_pajak_dua2').val('');
		$('#nama_pajak_dua2').val('');
		$('#nilai_dua2').val('');
		$('#subtotal_dua2').val('');
	});
	
	$(".btnSelectPajakn3").on('click',function(){
		var currentRow=$(this).closest("tr");
		var col1=currentRow.find("td:eq(1)").html();
		var col2=currentRow.find("td:eq(2)").html();
		var col3=currentRow.find("td:eq(3)").html();
		var col4=currentRow.find("td:eq(4)").html();
		var price=$('#price3').val();
		var qty=$('#received3').val();
		var total3=parseInt(price)*parseInt(qty);
		var subtotal3=$('#subtotal3').val();

		$('#modalPajakn3').modal('hide');
		$('#id_pajak_dua3').val(col1);
		$('#kode_pajak_dua3').val(col2);
		$('#nama_pajak_dua3').val(col3);
		$('#nilai_dua3').val(col4);

		var pajak3 = $('#nilai_dua3').val();
		var tot_pajak3 = (parseInt(pajak3)*parseInt(total3))/100;
		var netto3 = parseFloat(tot_pajak3)+parseFloat(subtotal3);
		
		$('#subtotal3').val(netto3.toFixed(2));
		$('#button-addon-hapus-pajak-3').addClass('text-danger');
		$('#button-addon-hapus-pajak-3').removeClass('d-none');	
	});
	$('#button-addon-hapus-pajak-3').on('click',function(event) {
		$(this).addClass('d-none');
		$('#id_pajak_dua3').val('');
		$('#kode_pajak_dua3').val('');
		$('#nama_pajak_dua3').val('');
		$('#nilai_dua3').val('');
		$('#subtotal_dua3').val('');
	});
	
	$(".btnSelectPajakn4").on('click',function(){
		var currentRow=$(this).closest("tr");
		var col1=currentRow.find("td:eq(1)").html();
		var col2=currentRow.find("td:eq(2)").html();
		var col3=currentRow.find("td:eq(3)").html();
		var col4=currentRow.find("td:eq(4)").html();
		var price=$('#price4').val();
		var qty=$('#received4').val();
		var total4=parseInt(price)*parseInt(qty);
		var subtotal4=$('#subtotal4').val();

		$('#modalPajakn4').modal('hide');
		$('#id_pajak_dua4').val(col1);
		$('#kode_pajak_dua4').val(col2);
		$('#nama_pajak_dua4').val(col3);
		$('#nilai_dua4').val(col4);

		var pajak4 = $('#nilai_dua4').val();
		var tot_pajak4 = (parseInt(pajak4)*parseInt(total4))/100;
		var netto4 = parseFloat(tot_pajak4)+parseFloat(subtotal4);
		
		$('#subtotal4').val(netto4.toFixed(2));
		$('#button-addon-hapus-pajak-4').addClass('text-danger');
		$('#button-addon-hapus-pajak-4').removeClass('d-none');	
	});
	$('#button-addon-hapus-pajak-4').on('click',function(event) {
		$(this).addClass('d-none');
		$('#id_pajak_dua4').val('');
		$('#kode_pajak_dua4').val('');
		$('#nama_pajak_dua4').val('');
		$('#nilai_dua4').val('');
		$('#subtotal_dua4').val('');
	});

	
	$(".btnSelectPajakn5").on('click',function(){
		var currentRow=$(this).closest("tr");
		var col1=currentRow.find("td:eq(1)").html();
		var col2=currentRow.find("td:eq(2)").html();
		var col3=currentRow.find("td:eq(3)").html();
		var col4=currentRow.find("td:eq(4)").html();
		var price=$('#price5').val();
		var qty=$('#received5').val();
		var total5=parseInt(price)*parseInt(qty);
		var subtotal5=$('#subtotal5').val();

		$('#modalPajakn5').modal('hide');
		$('#id_pajak_dua5').val(col1);
		$('#kode_pajak_dua5').val(col2);
		$('#nama_pajak_dua5').val(col3);
		$('#nilai_dua5').val(col4);

		var pajak5 = $('#nilai_dua5').val();
		var tot_pajak5 = (parseInt(pajak5)*parseInt(total5))/100;
		var netto5 = parseFloat(tot_pajak5)+parseFloat(subtotal5);
		
		$('#subtotal5').val(netto5.toFixed(2));
		$('#button-addon-hapus-pajak-5').addClass('text-danger');
		$('#button-addon-hapus-pajak-5').removeClass('d-none');	
	});
	$('#button-addon-hapus-pajak-5').on('click',function(event) {
		$(this).addClass('d-none');
		$('#id_pajak_dua5').val('');
		$('#kode_pajak_dua5').val('');
		$('#nama_pajak_dua5').val('');
		$('#nilai_dua5').val('');
		$('#subtotal_dua5').val('');
	});
	
	$('#total_netto').click(function(event) {
		var total = 0;
		var dp = $('#nilai_dp').val();
		$('input[id^=subtotal]').each(function(index, el) {
			if ($(this).val() == '') {
				$(this).val(0);
			}
			total += parseFloat($(this).val());
		});
		total=total-dp;
		$('#total_netto').html('Rp '+total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
	});
	$(".btnSelectDp1").on('click',function(){
		var currentRow=$(this).closest("tr");
		var col1=currentRow.find("td:eq(1)").html();
		var col2=currentRow.find("td:eq(2)").html();
		var col3=currentRow.find("td:eq(3)").html();
		var col4=currentRow.find("td:eq(4)").html();		
		
		$('#id_dp').val(col1);
		$('#dp').val(col4);
		
		$('#modalPurchaseAdvance1').modal('hide');
	});

	$('#simpan').click(function() {
		var vendor=$('#vendor').val();
		var no_inv=$('#no_inv').val(); 
		var no_po=$('#no_po').val();
		var tgl_input=$('#tgl_input').val();
		var tax_number=$('#tax_number').val();
		var tax_date=$('#tax_date').val();
		var department=$('#department').val();
		var project=$('#project').val();
		var dp=$('#down_payment').val();
		var term_pembayaran=$('#term_pembayaran').val();
		var delivery_date=$('#delivery_date').val();
		var purchasing_dept=$('#purchasing_dept').val();
		var status=$('#status').val();
		var jumlah_detail=$('#jumlah_detail').val();

		var i;
		if(vendor=='' || vendor=='Pilih Vendor'){
			alert("Mohon untuk mengisi Vendor !!!");
			$("select#vendor+button").removeClass('btn-light');
			$("select#vendor+button").addClass('btn-danger');			
		}else if(no_inv=='' || no_po=='' || tgl_input=='' || tax_number=='' || tax_date=='' || department=='' || project=='' || delivery_date==''|| purchasing_dept=='' || term_pembayaran=='' || status==''){
			alert("Mohon untuk diisi dengan lengkap !!!");
		}else{
			for (i=0;i<=jumlah_detail;i++)
			{
				var description=$('#description'+i).val();
				var kode_akun=$('#kode_akun'+i).val(); 
				var received=$('#received'+i).val();
				var unit=$('#unit'+i).val();
				var price=$('#price'+i).val();
				var diskon=$('#diskon'+i).val();
				var id_pajak=$('#id_pajak'+i).val();
				var nilai=$('#nilai'+i).val();			
				var id_pajak_dua=$('#id_pajak_dua'+i).val();	
				var nilai_dua=$('#nilai_dua'+i).val();
				var subtotal=$('#subtotal'+i).val();
				$.ajax({
						url: '<?php echo base_url();?>create_transaction/save_transaction_ap_detail',
						dataType: 'json',
						type: 'POST', 
						data: {no_inv:no_inv, 
								no_po:no_po,
								description:description,
								kode_akun:kode_akun,
								received:received,
								unit:unit,
								price:price, 
								diskon:diskon,
								id_pajak:id_pajak,
								nilai:nilai, 
								id_pajak_dua:id_pajak_dua,
								nilai_dua:nilai_dua,
								subtotal:subtotal},
						success: function (response){
						}   
					});
			}		
			$.ajax({
					url: '<?php echo base_url();?>create_transaction/save_transaction_ap',
					dataType: 'json',
					type: 'POST', 
					data: { vendor : vendor,
							no_inv:no_inv,
							no_po:no_po,
							tgl_input:tgl_input,
							tax_number:tax_number,
							tax_date:tax_date,
							department:department,
							project:project,
							dp:dp,
							term_pembayaran:term_pembayaran,
							delivery_date:delivery_date,
							purchasing_dept:purchasing_dept,
							status:status
					},
					success: function (response){						
						// alert(response);
						// alert('DATA TERSIMPAN !!!');						
					} 
				});
				
				Swal.fire({
					icon: 'success',
					title: 'Success!',
					html: 'Data is submitted successfully',
					showConfirmButton: false,
					timer: 1500
				}).then((result) => {
					if (result.dismiss === Swal.DismissReason.timer) {
					window.location="<?= base_url('home')?>";
					}
				});
				return false;
		}
	});
</script>