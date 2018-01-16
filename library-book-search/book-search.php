<div class="container">
	<div class="search_form_data">

		<form name="library_search" method="POST" >

			<div class="full_div">

				<div class="half_div">
					<label for="book_name">Book Name:</label>
					<input type="text" name="Book Name" id="book_name">
				</div>
				<div class="half_div">
					<?php 
				$terms = get_terms([
					'taxonomy' => 'book_author',
					'hide_empty' => false,
				]);
				?>
					<label for="book_author">Book Author:</label>
						<select name="Book Author" id="book_author">
						<option value=""> </option>
						<?php foreach ($terms as $term){ ?>
						<option value="<?php echo $term->term_id;?>"><?php echo $term->name;?></option>
]						<?php } ?>
					</select>
				</div>
			</div>

			<div class="full_div">
				<?php 
				$terms = get_terms([
					'taxonomy' => 'publisher',
					'hide_empty' => false,
				]);
				?>
				<div class="half_div">
					<label for="Book">Book publisher:</label>
					<select name="Book publisher" id="book_publisher">
						<option value=""> </option>
						<?php foreach ($terms as $term){ ?>
						<option value="<?php echo $term->term_id;?>"><?php echo $term->name;?></option>
]						<?php } ?>
					</select>

				</div>
				<div class="half_div">
					<label for="book_ratings">Ratings:</label>
					<select name="Ratings" id="book_ratings">
						<option value=""> </option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
					</select><br>
				</div>
			</div>	

			<div class="full_div">
					<p>
	<label for="amount">Price range:</label>
	<input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;" value="">
		<input type="hidden" id="min_amount"  value="0">
		<input type="hidden" id="max_amount"  value="500">

</p>

<div id="slider-range"></div>
        	</div>
			
			<div class="button"><br>
				<input type="submit" id="book_search" name="submit" value="Submit">
			</div>
		</form>

	</div>

	<div class="search_results" id="search_results" style="">

	Results

	</div>

</div>

