<?php
/**
 * The template for displaying the search form
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?>

<form action="/" method="GET" class="form form--search menu--header__item" id="search-form">
	<input type="search" class="form__input form__input form__input--search form--search__input form--search__input--search menu__item__link" placeholder="What are you looking for?" value="" name="s">
	<span class="form__input form__input--submit form--search__input form--search__input--submit" id="pseudo-submit"></span>
	<input class="form__input form__input--submit form--search__input form--search__input--submit" type="submit" id="search-submit" value="" />
</form>