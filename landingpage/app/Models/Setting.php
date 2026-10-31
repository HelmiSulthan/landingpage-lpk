<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'site_name',
        'tagline',
        'hero_title',
        'hero_description',
        'profile',
        'vision',
        'mission',
        'leader_photo',
        'leader_name',
        'leader_position',
        'address',
        'phone',
        'email',
        'whatsapp',
        'instagram',
        'tiktok',
        'students_count',
        'graduates_count',
        'japan_count',
        'experience_years',
        'graduates_gdrive_link',
        'maps_embed',
    ];

    /**
     * Bersihkan konten HTML dari Quill menjadi plain text bersih.
     * Gunakan ini untuk tampilan card/preview yang tidak butuh formatting.
     */
    public static function toPlainText(?string $html): string
    {
        if (!$html) return '';
        // Ganti tag blok dengan spasi agar kata tidak menyambung
        $html = preg_replace('/<\/(p|div|li|br|h[1-6])>/i', ' ', $html);
        // Strip semua tag
        $text = strip_tags($html);
        // Decode HTML entities termasuk &nbsp;
        $text = html_entity_decode($text, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        // Rapikan spasi ganda
        $text = preg_replace('/\s+/', ' ', $text);
        return trim($text);
    }

    /**
     * Bersihkan &nbsp; dan sanitasi konten Quill agar aman dari XSS dan bisa word-wrap normal.
     */
    public static function cleanHtml(?string $html): string
    {
        return self::purifyHtml($html);
    }

    /**
     * Sanitasi HTML dengan allowlist tag & atribut (defense-in-depth terhadap XSS).
     */
    public static function purifyHtml(?string $html): string
    {
        if (! $html) {
            return '';
        }

        $html = str_replace('&nbsp;', ' ', $html);

        if (! class_exists(\DOMDocument::class)) {
            return strip_tags($html, '<p><br><strong><em><b><i><u><s><span><ul><ol><li><a><h1><h2><h3><h4><h5><h6><blockquote><img>');
        }

        try {
            $dom = new \DOMDocument();
            $previous = libxml_use_internal_errors(true);
            $dom->loadHTML(
                '<?xml encoding="utf-8"?><div>' . $html . '</div>',
                LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD
            );
            libxml_clear_errors();
            libxml_use_internal_errors($previous);

            $wrapper = $dom->getElementsByTagName('div')->item(0);
            if ($wrapper) {
                self::sanitizeNode($wrapper);
            }

            $result = '';
            if ($wrapper) {
                foreach ($wrapper->childNodes as $child) {
                    $result .= $dom->saveHTML($child);
                }
            }

            return trim($result);
        } catch (\Throwable $e) {
            return strip_tags($html, '<p><br><strong><em><b><i><u><s><span><ul><ol><li><a><h1><h2><h3><h4><h5><h6><blockquote><img>');
        }
    }

    private static function sanitizeNode(\DOMNode $node): void
    {
        $allowedTags  = ['p', 'br', 'strong', 'em', 'b', 'i', 'u', 's', 'span', 'ul', 'ol', 'li', 'a', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'blockquote', 'img'];
        $allowedAttrs = ['href', 'src', 'alt', 'title', 'style', 'target', 'rel'];

        if (! $node->hasChildNodes()) {
            return;
        }

        $children = [];
        foreach ($node->childNodes as $child) {
            $children[] = $child;
        }

        foreach ($children as $child) {
            if (! $child instanceof \DOMElement) {
                continue;
            }

            $tag = strtolower($child->nodeName);

            if (! in_array($tag, $allowedTags, true)) {
                // Unwrap: angkat anak-anaknya ke parent, lalu hapus elemen ini.
                self::sanitizeNode($child);
                while ($child->firstChild) {
                    $node->insertBefore($child->firstChild, $child);
                }
                $node->removeChild($child);
                continue;
            }

            $attrsToRemove = [];
            foreach ($child->attributes as $attr) {
                $name  = strtolower($attr->nodeName);
                $value = $attr->nodeValue;

                if (str_starts_with($name, 'on')) {
                    $attrsToRemove[] = $attr->nodeName;
                    continue;
                }
                if (! in_array($name, $allowedAttrs, true)) {
                    $attrsToRemove[] = $attr->nodeName;
                    continue;
                }
                if (in_array($name, ['href', 'src'], true) && preg_match('#^\s*(javascript|vbscript|data)\s*:#i', $value)) {
                    $attrsToRemove[] = $attr->nodeName;
                }
                if ($name === 'style') {
                    $cleaned = preg_replace('#(expression\s*\(|url\s*\(\s*["\']?\s*(javascript|vbscript)\s*:)#i', '', $value);
                    $child->setAttribute($attr->nodeName, $cleaned);
                }
            }
            foreach ($attrsToRemove as $attrName) {
                $child->removeAttribute($attrName);
            }

            if ($tag === 'a' && $child->getAttribute('target') === '_blank' && $child->getAttribute('rel') === '') {
                $child->setAttribute('rel', 'noopener noreferrer');
            }

            self::sanitizeNode($child);
        }
    }

    /**
     * Normalisasi nomor WhatsApp menjadi URL wa.me (hanya angka, awalan 0 diubah ke 62).
     */
    public function getWhatsappLinkAttribute(): string
    {
        $number = preg_replace('/[^0-9]/', '', $this->whatsapp ?? '');
        if ($number === '') {
            return '#kontak';
        }
        if (str_starts_with($number, '0')) {
            $number = '62' . substr($number, 1);
        }
        return "https://wa.me/{$number}";
    }

    /**
     * Ekstrak dan validasi URL Google Maps Embed dari input URL atau tag <iframe>.
     */
    public static function sanitizeMapsEmbed(?string $input): ?string
    {
        if (! $input) {
            return null;
        }

        $input = trim($input);

        // Jika user menempelkan kode <iframe src="...">, ekstrak isi atribut src
        if (preg_match('/<iframe[^>]+src=["\']([^"\']+)["\']/i', $input, $matches)) {
            $input = trim($matches[1]);
        }

        // Hanya izinkan URL HTTPS dari Google Maps
        if (preg_match('#^https://(www\.)?google\.[a-z.]+/maps/embed#i', $input) ||
            preg_match('#^https://maps\.google\.[a-z.]+/#i', $input)) {
            return $input;
        }

        return null;
    }
}
