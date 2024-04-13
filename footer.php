<div class="footer1">
	<div class="container">
		<div class="row">

			<div class="col-md-3 widget">
				&nbsp;
			</div>

			<div class="col-md-3 widget">
				<h3 class="widget-title">Contact</h3>
				<div class="widget-body">
					<p>Digital Skillz<br>
						59 boulevard Barrieu<br>
						63130 Royat<br>
						<a href="mailto:#">dskillz@protonmail.com</a><br>
						<br>
						06 59 28 18 22
					</p>
				</div>
			</div>

			<div class="col-md-6 widget">
				<h3 class="widget-title">Mise à jour</h3>
				<div class="widget-body">
					<p>Version 1.1 /// Mise à jour le 15 Juin 2021</p>
				</div>
			</div>

		</div> <!-- /row of widgets -->
	</div>
</div>

<div class="footer2">
	<div class="container">
		<div class="row">


			<div class="col-md-6 widget">
				<div class="widget-body">
					<p class="text-right">
						Copyright &copy; 2021, Digital Skillz
					</p>
				</div>
			</div>

		</div> <!-- /row of widgets -->
	</div>
</div>

<!-- Table filtering -->
<script>
	(function (document) {
		'use strict';

		var TableFilter = (function (myArray) {
			var search_input;

			function _onInputSearch(e) {
				search_input = e.target;
				var tables = document.getElementsByClassName(search_input.getAttribute('data-table'));
				myArray.forEach.call(tables, function (table) {
					myArray.forEach.call(table.tBodies, function (tbody) {
						myArray.forEach.call(tbody.rows, function (row) {
							var text_content = row.textContent.toLowerCase();
							var search_val = search_input.value.toLowerCase();
							console.log("search_chars = " + search_val);
							row.style.display = text_content.indexOf(search_val) > -1 ?
								'' : 'none';
						});
					});
				});

			}

			return {
				init: function () {
					var inputs = document.getElementsByClassName('search-input');

					myArray.forEach.call(inputs, function (input) {
						input.oninput = _onInputSearch;
					});
				}
			};
		})(Array.prototype);

		document.addEventListener('readystatechange', function () {
			if (document.readyState === 'complete') {
				TableFilter.init();
			}
		});

	})(document);
</script>