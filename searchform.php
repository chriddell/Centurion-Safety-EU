<?php
/**
 * The template for displaying the search form
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?>

<form action="/" method="GET" class="form form--search form--search--in-header menu--header__item" id="header-search-form">
	<input type="search" class="form__input form--search--in-header__input form__input--search form--search--in-header__input--search menu--header__item" placeholder="What are you looking for?" value="" name="s">
	<span class="form__input form--search--in-header__input form__input--submit form--search--in-header__input--submit form--search--in-header__input--pseudo-submit" id="header-pseudo-submit">
		<span class="icon icon--search icon--centered icon--fit"></span>
	</span>
	<input class="form__input form--search--in-header__input form__input--submit form--search__input--submit form--search--in-header__input--submit" type="submit" id="header-search-submit" value="" />
</form>