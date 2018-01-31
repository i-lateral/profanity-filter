<?php

namespace ilateral\ProfanityFilter;

use LogicException;

/**
 * Class to handle examining a string to determine if it
 * contains profanity from our pre-defined list.
 * 
 *
 * @author Mo <morven@ilateral.co.uk>
 * @package ProfanityFilter
 */
class ProfanityFilter
{

    /**
     * String that needs processing
     * 
     * @var string
     */
    protected $original_string;

    /**
     * Default list of words to check against
     *
     * @var array
     */
    protected $profanity_list = [
        '4r5e',
        '5h1t',
        '5hit',
        'a55',
        'anal',
        'anus',
        'ar5e',
        'arrse',
        'arse',
        'ass',
        'ass-fucker',
        'asses',
        'assfucker',
        'assfukka',
        'asshole',
        'assholes',
        'asswhole',
        'a_s_s',
        'b!tch',
        'b00bs',
        'b17ch',
        'b1tch',
        'ballbag',
        'balls',
        'ballsack',
        'bastard',
        'beastial',
        'beastiality',
        'bellend',
        'bestial',
        'bestiality',
        'bi+ch',
        'biatch',
        'bitch',
        'bitcher',
        'bitchers',
        'bitches',
        'bitchin',
        'bitching',
        'bloody',
        'blowjob',
        'blowjob',
        'blowjobs',
        'boiolas',
        'bollock',
        'bollok',
        'boner',
        'boob',
        'boobs',
        'booobs',
        'boooobs',
        'booooobs',
        'booooooobs',
        'breasts',
        'buceta',
        'bugger',
        'bum',
        'bunnyfucker',
        'butt',
        'butts',
        'butthole',
        'buttmuch',
        'buttplug',
        'c0ck',
        'c0cksucker',
        'carpetmuncher',
        'cawk',
        'chink',
        'cipa',
        'cl1t',
        'clit',
        'clitoris',
        'clits',
        'cnut',
        'cock',
        'cock-sucker',
        'cockface',
        'cockhead',
        'cockmunch',
        'cockmuncher',
        'cocks',
        'cocksuck',
        'cocksucked',
        'cocksucker',
        'cocksucking',
        'cocksucks',
        'cocksuka',
        'cocksukka',
        'cok',
        'cokmuncher',
        'coksucka',
        'coon',
        'cox',
        'crap',
        'cum',
        'cummer',
        'cumming',
        'cums',
        'cumshot',
        'cunilingus',
        'cunillingus',
        'cunnilingus',
        'cunt',
        'cuntlick',
        'cuntlicker',
        'cuntlicking',
        'cunts',
        'cyalis',
        'cyberfuc',
        'cyberfuck',
        'cyberfucked',
        'cyberfucker',
        'cyberfuckers',
        'cyberfucking',
        'd1ck',
        'damn',
        'dick',
        'dickhead',
        'dildo',
        'dildos',
        'dink',
        'dinks',
        'dirsa',
        'dlck',
        'dog-fucker',
        'doggin',
        'dogging',
        'donkeyribber',
        'doosh',
        'duche',
        'dyke',
        'ejaculate',
        'ejaculated',
        'ejaculates',
        'ejaculating',
        'ejaculatings',
        'ejaculation',
        'ejakulate',
        'fuck',
        'fucker',
        'f4nny',
        'fag',
        'fagging',
        'faggitt',
        'faggot',
        'faggs',
        'fagot',
        'fagots',
        'fags',
        'fanny',
        'fannyflaps',
        'fannyfucker',
        'fanyy',
        'fatass',
        'fcuk',
        'fcuker',
        'fcuking',
        'feck',
        'fecker',
        'felching',
        'fellate',
        'fellatio',
        'fingerfuck',
        'fingerfucked',
        'fingerfucker',
        'fingerfuckers',
        'fingerfucking',
        'fingerfucks',
        'fistfuck',
        'fistfucked',
        'fistfucker',
        'fistfuckers',
        'fistfucking',
        'fistfuckings',
        'fistfucks',
        'flange',
        'fook',
        'fooker',
        'fuck',
        'fucka',
        'fucked',
        'fucker',
        'fuckers',
        'fuckhead',
        'fuckheads',
        'fuckin',
        'fucking',
        'fuckings',
        'fuckingshitmotherfucker',
        'fuckme',
        'fucks',
        'fuckwhit',
        'fuckwit',
        'fudgepacker',
        'fuk',
        'fuker',
        'fukker',
        'fukkin',
        'fuks',
        'fukwhit',
        'fukwit',
        'fux',
        'fux0r',
        'f_u_c_k',
        'gangbang',
        'gangbanged',
        'gangbangs',
        'gaylord',
        'gaysex',
        'goatse',
        'God',
        'god-dam',
        'god-damned',
        'goddamn',
        'goddamned',
        'hardcoresex',
        'hell',
        'heshe',
        'hoar',
        'hoare',
        'hoer',
        'homo',
        'hore',
        'horniest',
        'horny',
        'hotsex',
        'http',
        'jack-off',
        'jackoff',
        'jap',
        'jerk-off',
        'jism',
        'jiz',
        'jizm',
        'jizz',
        'kawk',
        'knob',
        'knobead',
        'knobed',
        'knobend',
        'knobhead',
        'knobjocky',
        'knobjokey',
        'kock',
        'kondum',
        'kondums',
        'kum',
        'kummer',
        'kumming',
        'kums',
        'kunilingus',
        'l3i+ch',
        'l3itch',
        'labia',
        'lmfao',
        'lust',
        'lusting',
        'm0f0',
        'm0fo',
        'm45terbate',
        'ma5terb8',
        'ma5terbate',
        'masochist',
        'master-bate',
        'masterb8',
        'masterbat*',
        'masterbat3',
        'masterbate',
        'masterbation',
        'masterbations',
        'masturbate',
        'mo-fo',
        'mof0',
        'mofo',
        'mothafuck',
        'mothafucka',
        'mothafuckas',
        'mothafuckaz',
        'mothafucked',
        'mothafucker',
        'mothafuckers',
        'mothafuckin',
        'mothafucking',
        'mothafuckings',
        'mothafucks',
        'motherfucker',
        'motherfuck',
        'motherfucked',
        'motherfucker',
        'motherfuckers',
        'motherfuckin',
        'motherfucking',
        'motherfuckings',
        'motherfuckka',
        'motherfucks',
        'muff',
        'mutha',
        'muthafecker',
        'muthafuckker',
        'muther',
        'mutherfucker',
        'n1gga',
        'n1gger',
        'nazi',
        'nigg3r',
        'nigg4h',
        'nigga',
        'niggah',
        'niggas',
        'niggaz',
        'nigger',
        'niggers',
        'nob',
        'nobjokey',
        'nobhead',
        'nobjocky',
        'nobjokey',
        'numbnuts',
        'nutsack',
        'orgasim',
        'orgasims',
        'orgasm',
        'orgasms',
        'p0rn',
        'pawn',
        'pecker',
        'penis',
        'penisfucker',
        'phonesex',
        'phuck',
        'phuk',
        'phuked',
        'phuking',
        'phukked',
        'phukking',
        'phuks',
        'phuq',
        'pigfucker',
        'pimpis',
        'piss',
        'pissed',
        'pisser',
        'pissers',
        'pisses',
        'pissflaps',
        'pissin',
        'pissing',
        'pissoff',
        'poop',
        'porn',
        'porno',
        'pornography',
        'pornos',
        'prick',
        'pricks',
        'pron',
        'pube',
        'pusse',
        'pussi',
        'pussies',
        'pussy',
        'pussys',
        'rectum',
        'retard',
        'rimjaw',
        'rimming',
        'shit',
        's.o.b.',
        'sadist',
        'schlong',
        'screwing',
        'scroat',
        'scrote',
        'scrotum',
        'semen',
        'sex',
        'sh!+',
        'sh!t',
        'sh1t',
        'shag',
        'shagger',
        'shaggin',
        'shagging',
        'shemale',
        'shi+',
        'shit',
        'shitdick',
        'shite',
        'shited',
        'shitey',
        'shitfuck',
        'shitfull',
        'shithead',
        'shiting',
        'shitings',
        'shits',
        'shitted',
        'shitter',
        'shitters',
        'shitting',
        'shittings',
        'shitty',
        'skank',
        'slut',
        'sluts',
        'smegma',
        'smut',
        'snatch',
        'son-of-a-bitch',
        'spac',
        'spunk',
        's_h_i_t',
        't1tt1e5',
        't1tties',
        'teets',
        'teez',
        'testical',
        'testicle',
        'tit',
        'titfuck',
        'tits',
        'titt',
        'tittie5',
        'tittiefucker',
        'titties',
        'tittyfuck',
        'tittywank',
        'titwank',
        'tosser',
        'turd',
        'tw4t',
        'twat',
        'twathead',
        'twatty',
        'twunt',
        'twunter',
        'v14gra',
        'v1gra',
        'vagina',
        'viagra',
        'vulva',
        'w00se',
        'wang',
        'wank',
        'wanker',
        'wanky',
        'whoar',
        'whore',
        'willies',
        'willy',
        'www',
        'xrated'
    ];

    /**
     * Cache the list of words from the profanity list
     * that are matched by this class 
     *
     * @var array
     */
    protected $matched_words = [];

    /**
     * Getter for original_string
     *
     * @return string
     */
    public function get_original_string()
    {
        return $this->original_string;
    }

    /**
     * Setter for original_string
     *
     * @param string
     * @return self
     */
    public function set_original_string($string)
    {
        $this->original_string = $string;
        return $this;
    }

    /**
     * Getter for profanity list
     *
     * @return array
     */
    public function get_profanity_list()
    {
        return $this->profanity_list;
    }

    /**
     * Add a profanity word to the list
     *
     * @param string
     * @return self
     */
    public function add_profanity($string)
    {
        $this->profanity_list[] = $string;
        return $this;
    }

    /**
     * Remove a tag from the list
     *
     * @param string
     * @return self
     */
    public function remove_profanity($string)
    {
        for ($x = 0; $x < count($this->profanity_list); $x++) {
            if ($this->profanity_list[$x] == $string) {
                unset($this->profanity_list[$x]);
                // Reset array keys
                $this->profanity_list = array_values($this->profanity_list);
            }
        }
        return $this;
    }

    /**
     * Constructor for this class, accepts the string we want
     * to use.
     *
     * @param $string string to check against
     */
    public function __construct($string)
    {
        $this->original_string = $string;
    }

    /**
	 * Check the set string to see if it matches a profanity in our list,
     * if it does then add the matched word to our results.
	 *
	 * @return string
     * @throws LogicException
	 */
	public function execute()
	{
        if (!is_array($this->original_string)) {
            throw new LogicException('ProfanityFilter::$original_string needs to be an array');
        }
        
        $content = strtolower(strip_tags($this->original_string));
        
        foreach ($profanity_list as $item) {
			$filtered = strpos($content, " " . trim($item) . " ");
			$filtered_format = strpos($content, "<p>" . trim($item) . "</p>");
			$filtered_endp = strpos($content, trim($item) . "</p>");
			$filtered_nl = strpos($content, " " . trim($item) . '\n');
			$filtered_end = strpos($content, " " . trim($item) . '.');
			$filtered_comma = strpos($content, " " . trim($item) . ',');

			if($filtered !== false || $filtered_format !== false || $filtered_endp !== false || $filtered_nl !== false || $filtered_end !== false || $filtered_comma !== false) {
				$this->matched_words[] = $item;
			}
        }

        return $this;
	}

    /**
	 * Check to see if the string contains words in the
     * profanity list, returns true if it has, false if not.
	 *
	 * @return boolean
	 */
	public function check()
	{
        $this->execute();

        if (count($this->matched_words)) {
            return true;
        }

        return false;
    }
    
    /**
     * Run the checks and return any results 
     *
     * @return string
     */
    public function get_matches()
    {
        $this->execute();

        return $this->matched_words;
    }
}