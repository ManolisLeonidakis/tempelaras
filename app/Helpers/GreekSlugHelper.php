<?php

namespace App\Helpers;

class GreekSlugHelper
{
    /**
     * Greek to Latin transliteration map.
     */
    private static array $greekToLatin = [
        'Α' => 'A', 'α' => 'a',
        'Β' => 'B', 'β' => 'v',
        'Γ' => 'G', 'γ' => 'g',
        'Δ' => 'D', 'δ' => 'd',
        'Ε' => 'E', 'ε' => 'e',
        'Ζ' => 'Z', 'ζ' => 'z',
        'Η' => 'I', 'η' => 'i',
        'Θ' => 'Th', 'θ' => 'th',
        'Ι' => 'I', 'ι' => 'i',
        'Κ' => 'K', 'κ' => 'k',
        'Λ' => 'L', 'λ' => 'l',
        'Μ' => 'M', 'μ' => 'm',
        'Ν' => 'N', 'ν' => 'n',
        'Ξ' => 'X', 'ξ' => 'x',
        'Ο' => 'O', 'ο' => 'o',
        'Π' => 'P', 'π' => 'p',
        'Ρ' => 'R', 'ρ' => 'r',
        'Σ' => 'S', 'σ' => 's', 'ς' => 's',
        'Τ' => 'T', 'τ' => 't',
        'Υ' => 'Y', 'υ' => 'y',
        'Φ' => 'F', 'φ' => 'f',
        'Χ' => 'Ch', 'χ' => 'ch',
        'Ψ' => 'Ps', 'ψ' => 'ps',
        'Ω' => 'O', 'ω' => 'o',
        'Ά' => 'A', 'ά' => 'a',
        'Έ' => 'E', 'έ' => 'e',
        'Ή' => 'I', 'ή' => 'i',
        'Ί' => 'I', 'ί' => 'i',
        'Ό' => 'O', 'ό' => 'o',
        'Ύ' => 'Y', 'ύ' => 'y',
        'Ώ' => 'O', 'ώ' => 'o',
        'Ϊ' => 'I', 'ϊ' => 'i',
        'Ϋ' => 'Y', 'ϋ' => 'y',
        'ΐ' => 'i', 'ΰ' => 'y',
    ];

    /**
     * Convert Greek text to URL-friendly slug.
     */
    public static function toSlug(string $text): string
    {
        // Convert to lowercase.
        $text = mb_strtolower($text);

        // Transliterate Greek to Latin.
        $text = strtr($text, self::$greekToLatin);

        // Replace spaces and special characters with hyphens.
        $text = preg_replace('/[^a-z0-9]+/', '-', $text);

        // Remove leading and trailing hyphens.
        $text = trim($text, '-');

        return $text;
    }

    /**
     * Reverse map for converting slugs back to Greek.
     */
    private static array $specialtyMap = [
        'ydraulikos' => 'Υδραυλικός',
        'ilektrologos' => 'Ηλεκτρολόγος',
        'xylourgos' => 'Ξυλουργός',
        'monitis' => 'Μονωτής',
        'sideras' => 'Σιδεράς',
        'gypsokanidas' => 'Γυψοσανιδάς',
        'elaiochromastistis' => 'Ελαιοχρωματιστής',
        'michanikos' => 'Μηχανικός',
        'kipouros' => 'Κηπουρός',
        'technikos-klimatismou' => 'Τεχνικός Κλιματισμού',
        'technikos-thermensis' => 'Τεχνικός Θέρμανσης',
        'technikos-apofraxeon' => 'Τεχνικός Αποφράξεων',
        'technikos-apolymangeon' => 'Τεχνικός Απολυμάνσεων',
    ];

    /**
     * Map for cities.
     */
    private static array $cityMap = [
        'athina' => 'Αθήνα',
        'thessaloniki' => 'Θεσσαλονίκη',
        'patra' => 'Πάτρα',
        'irakleio' => 'Ηράκλειο',
        'larisa' => 'Λάρισα',
        'volos' => 'Βόλος',
        'ioannina' => 'Ιωάννινα',
        'kavala' => 'Καβάλα',
        'kalamata' => 'Καλαμάτα',
        'serres' => 'Σέρρες',
        'chania' => 'Χανιά',
        'alexandroupoli' => 'Αλεξανδρούπολη',
        'xanthi' => 'Ξάνθη',
        'katerini' => 'Κατερίνη',
        'trikala' => 'Τρίκαλα',
        'lamia' => 'Λαμία',
        'kozani' => 'Κοζάνη',
        'drama' => 'Δράμα',
        'veria' => 'Βέροια',
        'karditsa' => 'Καρδίτσα',
        'rethymno' => 'Ρέθυμνο',
        'ptolemaida' => 'Πτολεμαΐδα',
        'giannitsa' => 'Γιαννιτσά',
        'tripoli' => 'Τρίπολη',
        'korinth' => 'Κόρινθος',
        'pyrgos' => 'Πύργος',
        'agrinio' => 'Αγρίνιο',
        'arta' => 'Άρτα',
        'kerkira' => 'Κέρκυρα',
        'rodos' => 'Ρόδος',
        'mytilini' => 'Μυτιλήνη',
    ];

    /**
     * Convert slug back to Greek specialty.
     */
    public static function slugToSpecialty(string $slug): ?string
    {
        return self::$specialtyMap[$slug] ?? null;
    }

    /**
     * Convert slug back to Greek city.
     */
    public static function slugToCity(string $slug): ?string
    {
        return self::$cityMap[$slug] ?? null;
    }

    /**
     * Get all specialty slugs.
     */
    public static function getSpecialtySlugs(): array
    {
        return array_keys(self::$specialtyMap);
    }

    /**
     * Get all city slugs.
     */
    public static function getCitySlugs(): array
    {
        return array_keys(self::$cityMap);
    }

    /**
     * Get all specialties.
     */
    public static function getSpecialties(): array
    {
        return self::$specialtyMap;
    }

    /**
     * Get all cities.
     */
    public static function getCities(): array
    {
        return self::$cityMap;
    }
}
