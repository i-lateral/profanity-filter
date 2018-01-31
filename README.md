# PHP Profanity Filter

Simple PHP library designed to check a string against
a pre-defined profanity list and return any matches

## Installation

The prefered way to run this is via composer:

    # composer require i-lateral/profanity-filter

## Usage

The simplest way to use this library is eiwth to run a check, or get matched tags. Both of these methods execure this
library and return results (but slightly differently).

This library also has some limited support for text within.

### Check for profanity

The `check` function checks the submitted string against the 
profanity list and returns true if any matches were found.

    use ilateral\ProfanityFilter\ProfanityFilter;

    $string = "String to check";
    $test = new ProfanityFilter($string);
    $result = $test->check();

### List all matched words

If you want more granular results than provided by the
`check` function, you can instead use the `get_matches`
method.

This method performs the same test, but returns an array
of any matched words.

    use ilateral\ProfanityFilter\ProfanityFilter;

    $string = "String to check";
    $test = new ProfanityFilter($string);
    $result = $test->get_matches();

## Adding or removing words to check

This library comes bundled with a pretty comprehensive
list of words. But if you want to add more (ore remove some),
you can use the methods provided.

### Adding a word

To add a word to the profanity list, simply call the 
`add_profanity` method:

    use ilateral\ProfanityFilter\ProfanityFilter;

    $string = "String with custom word";
    $test = new ProfanityFilter($string);
    $test->add_profanity("custom");
    $result = $test->check();

### Removing a word

To remove a word to the profanity list, simply call the 
`remove_profanity` method:

    use ilateral\ProfanityFilter\ProfanityFilter;

    $string = "I like big butts and I cannot lie";
    $test = new ProfanityFilter($string);
    $test->remove_profanity("butts");
    $result = $test->check();
