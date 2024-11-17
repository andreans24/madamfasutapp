<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{ asset('admin-template/assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('admin-template/assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('admin-template/assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('admin-template/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('admin-template/assets/vendor/js/menu.js') }}"></script>
<script src="{{ asset('admin-template/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
<!-- Main JS -->
<script src="{{ asset('admin-template/assets/js/main.js') }}"></script>
<!-- Page JS -->
<script src="{{ asset('admin-template/assets/js/dashboards-analytics.js') }}"></script>
{{-- Sweet Alert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
{{-- Data Tables --}}
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#tools_category_id').select2();
	});

</script>

<!-- DataTables JS -->


<!-- Place this tag before closing body tag for github widget button. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>