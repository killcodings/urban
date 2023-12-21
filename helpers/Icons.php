<?php

class Icons {
	public static function android( $color ) {
		return "<svg xmlns='http://www.w3.org/2000/svg' width='28' height='16' fill='none'><path fill='$color' d='M20.9 4.8 23 .7a.5.5 0 0 0 0-.5l-.3-.2a.5.5 0 0 0-.5.2L20 4.4a13.5 13.5 0 0 0-11.5 0L6.2.2 5.9 0h-.3l-.2.3v.4l2.2 4A14.5 14.5 0 0 0 .7 16h27a13.6 13.6 0 0 0-6.9-11.2ZM8 11.9a1 1 0 0 1-.6-.2c-.2 0-.3-.3-.4-.5a1.2 1.2 0 0 1 .2-1.3l.5-.3a1 1 0 0 1 1 .2l.4.5a1.2 1.2 0 0 1-.1 1.1l-.4.4a1 1 0 0 1-.6.1Zm12.5 0a1 1 0 0 1-.8-.3 1.2 1.2 0 0 1-.4-.8 1.2 1.2 0 0 1 .4-.9 1.1 1.1 0 0 1 .8-.3c.3 0 .5 0 .8.3.2.2.3.5.3.9 0 .3-.1.6-.3.8-.3.2-.5.3-.8.3Z'/></svg>";
	}

	public static function ios( $color ) {
		return "<svg width='16' height='20' viewBox='0 0 16 20' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M13.3636 10.6359C13.3832 9.09202 14.1985 7.63115 15.4918 6.82249C14.6759 5.6374 13.3092 4.88602 11.8874 4.84078C10.3708 4.67889 8.90062 5.76366 8.12782 5.76366C7.34007 5.76366 6.15022 4.85685 4.86895 4.88366C3.19887 4.93853 1.64194 5.90417 0.82941 7.38906C-0.917205 10.4644 0.385612 14.9841 2.05872 17.47C2.89582 18.6873 3.87414 20.047 5.15425 19.9988C6.40692 19.9459 6.87477 19.1864 8.38684 19.1864C9.88489 19.1864 10.3238 19.9988 11.6299 19.9681C12.9741 19.9459 13.821 18.7454 14.6287 17.5166C15.2301 16.6493 15.693 15.6907 16 14.6763C14.4204 13.9969 13.3654 12.3802 13.3636 10.6359Z' fill='$color'/><path d='M10.8966 3.20595C11.6295 2.31119 11.9906 1.16113 11.9031 0C10.7834 0.1196 9.74914 0.663834 9.00635 1.52426C8.27999 2.36494 7.90199 3.49477 7.97345 4.61152C9.09356 4.62325 10.1947 4.09376 10.8966 3.20595Z' fill='$color'/></svg>";
	}

	public static function percent( $color ) {
		return "<svg width='16' height='16' viewBox='0 0 16 16' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M12.3248 3.41473L3.41503 12.3245M5.96067 4.36934C5.96067 5.24804 5.24835 5.96037 4.36965 5.96037C3.49095 5.96037 2.77863 5.24804 2.77863 4.36934C2.77863 3.49065 3.49095 2.77832 4.36965 2.77832C5.24835 2.77832 5.96067 3.49065 5.96067 4.36934ZM12.9612 11.3698C12.9612 12.2485 12.2488 12.9609 11.3702 12.9609C10.4915 12.9609 9.77913 12.2485 9.77913 11.3698C9.77913 10.4911 10.4915 9.77882 11.3702 9.77882C12.2488 9.77882 12.9612 10.4911 12.9612 11.3698Z' stroke='$color' stroke-width='1.42779' stroke-linecap='round' stroke-linejoin='round'/></svg>";
	}

	public static function gift( $color ) {
		$id = Uniqid();
		return "<svg width='16' height='16' viewBox='0 0 16 16' fill='none' xmlns='http://www.w3.org/2000/svg'><g clip-path='url(#clip0_113_$id)'><path d='M13.3522 7.7611V14.1247H3.17041V7.7611M8.26132 14.1247V4.57928M8.26132 4.57928H5.39768C4.97575 4.57928 4.57109 4.41167 4.27274 4.11331C3.97439 3.81496 3.80677 3.4103 3.80677 2.98837C3.80677 2.56643 3.97439 2.16178 4.27274 1.86343C4.57109 1.56507 4.97575 1.39746 5.39768 1.39746C7.62495 1.39746 8.26132 4.57928 8.26132 4.57928ZM8.26132 4.57928H11.125C11.5469 4.57928 11.9515 4.41167 12.2499 4.11331C12.5482 3.81496 12.7159 3.4103 12.7159 2.98837C12.7159 2.56643 12.5482 2.16178 12.2499 1.86343C11.9515 1.56507 11.5469 1.39746 11.125 1.39746C8.89768 1.39746 8.26132 4.57928 8.26132 4.57928ZM1.89768 4.57928H14.625V7.7611H1.89768V4.57928Z' stroke='$color' stroke-width='1.29047' stroke-linecap='round' stroke-linejoin='round'/></g><defs><clipPath id='clip0_113_$id'><rect width='15.2727' height='15.2727' fill='white' transform='translate(0.624908 0.125)'/></clipPath></defs></svg>";
	}

	public static function star()
	{
		return "<svg xmlns='http://www.w3.org/2000/svg' width='13' height='12' fill='none'><path fill='#FFDA44' stroke='#FFDA44' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.7' d='M6.5 1 8 4.1l3.5.5L9 7.1l.6 3.4L6.5 9l-3 1.6.5-3.4-2.5-2.5L5 4.1 6.5 1Z'/></svg>";
	}
	public static function cross($color)
	{
		$id = Uniqid();
		return "<svg width='18' height='18' viewBox='0 0 18 18' fill='none'><g id='Frame' clip-path='url(#clip0_365_$id)'><path id='Vector' d='M13.2727 5.27295L4.27271 14.2729' stroke='$color' stroke-width='1.09091' stroke-linecap='round' stroke-linejoin='round'/><path id='Vector_2' d='M4.27271 5.27295L13.2727 14.2729' stroke='$color' stroke-width='1.09091' stroke-linecap='round' stroke-linejoin='round'/></g><defs><clipPath id='clip0_365_$id'><rect width='17' height='17' fill='white' transform='translate(0.272705 0.272949)'/></clipPath></defs></svg>";
	}
	public static function arrowUpRight($color)
	{
		return "<svg width='20' height='21' viewBox='0 0 20 21' fill='none'><path d='M5.83526 14.2263L14.1649 5.89065M14.1649 5.89065L5.83154 5.89294M14.1649 5.89065L14.1686 14.224' stroke='$color' stroke-width='1.67' stroke-linecap='round' stroke-linejoin='round'/></svg>";
	}
}
