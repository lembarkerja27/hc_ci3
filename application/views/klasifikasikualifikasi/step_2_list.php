<!doctype html>
<html>
    <head>
        <title>HC</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
        <style>
            .dataTables_wrapper {
                min-height: 500px
            }
            
            .dataTables_processing {
                position: absolute;
                top: 50%;
                left: 50%;
                width: 100%;
                margin-left: -50%;
                margin-top: -25px;
                padding-top: 20px;
                text-align: center;
                font-size: 1.2em;
                color:grey;
            }
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Step_2 List</h2>
            </div>
            <div class="col-md-4 text-center">
                <div class="alert alert-success" role="alert" style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('klasifikasikualifikasi/create'), 'Create', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('klasifikasikualifikasi/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>TglPemohon</th>
		    <th>Bidang</th>
		    <th>NoRegisterAssoc</th>
		    <th>Tempat Upstk</th>
		    <th>Kualifikasi</th>
		    <th>SubBidang</th>
		    <th>Provinsi</th>
		    <th>Jenis Permohonan</th>
		    <th>Up BeritaAcara</th>
		    <th>Up SuratPengantar</th>
		    <th>Up PenilaianMandiri</th>
		    <th>Up SuratPermohonan</th>
		    <th>Up FcSertifikatKeahlian</th>
		    <th>Created By</th>
		    <th>Created Date</th>
		    <th>Updated By</th>
		    <th>Updated Date</th>
		    <th>Program Name</th>
		    <th width="200px">Action</th>
                </tr>
            </thead>
	    
        </table>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };

                var t = $("#mytable").dataTable({
                    initComplete: function() {
                        var api = this.api();
                        $('#mytable_filter input')
                                .off('.DT')
                                .on('keyup.DT', function(e) {
                                    if (e.keyCode == 13) {
                                        api.search(this.value).draw();
                            }
                        });
                    },
                    oLanguage: {
                        sProcessing: "loading..."
                    },
                    
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    scrollX: true,
                    ajax: {"url": "klasifikasikualifikasi/json", "type": "POST"},
                    columns: [
                        {
                            "data": "kd_step2",
                            "orderable": false
                        },{"data": "tglPemohon"},{"data": "Bidang"},{"data": "noRegisterAssoc"},{"data": "tempat_upstk"},{"data": "kualifikasi"},{"data": "subBidang"},{"data": "provinsi"},{"data": "jenis_permohonan"},{"data": "Up_beritaAcara"},{"data": "Up_suratPengantar"},{"data": "Up_penilaianMandiri"},{"data": "Up_suratPermohonan"},{"data": "Up_fcSertifikatKeahlian"},{"data": "created_by"},{"data": "created_date"},{"data": "updated_by"},{"data": "updated_date"},{"data": "program_name"},
                        {
                            "data" : "action",
                            "orderable": false,
                            "className" : "text-center"
                        }
                    ],
                    order: [[0, 'desc']],
                    rowCallback: function(row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', row).html(index);
                    }
                });
            });
        </script>
    </body>
</html>