
<div class="container">
	<div class="search_form_data">

		<form name="library_search" method="POST" >

			<div class="full_div">

				<div class="half_div">
					<label for="book_name">Book Name:</label>
					<input type="text" name="Book Name" id="book_name">
				</div>
				<div class="half_div">
					<label for="book_author">Book Author:</label>
					<input type="text" name="Book Author" id="book_author">
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
				 <div data-role="rangeslider">
        <label for="price-min">Price:</label>
        <input type="range" name="price-min" id="price-min" value="200" min="0" max="1000">
        <label for="price-max">Price:</label>
        <input type="range" name="price-max" id="price-max" value="800" min="0" max="1000">
      </div>
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

