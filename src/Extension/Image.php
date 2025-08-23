<?php


namespace SamDark\Sitemap\Extension;


/**
 * Image extension
 * @see https://support.google.com/webmasters/answer/178636
 */
final class Image implements ExtensionInterface
{
    private const int LIMIT = 1000;

    /**
     * @var string URL of the image.
     */
    private string $location;

    /**
     * @var string Caption of the image.
     */
    private string $caption;

    /**
     * @var string Geographic location of the image.
     *
     * For example, "Limerick, Ireland".
     */
    private string $geoLocation;

    /**
     * @var string Title of the image.
     */
    private string $title;

    /**
     * @var string URL to the license of the image.
     */
    private string $license;

    /**
     * Image constructor.
     * @param $location
     */
    public function __construct(string $location)
    {
        $this->location = $location;
    }
	
	public static function make(string $location): Image
	{
		return new static($location);
    }
    public function getCaption(): string
    {
        return $this->caption;
    }

    /**
     * @param string $caption
     */
    public function setCaption(string $caption): Image
    {
        $this->caption = $caption;
		
		return $this;
    }

    /**
     * @return string
     */
    public function getGeoLocation(): string
    {
        return $this->geoLocation;
    }

    /**
     * @param string $geoLocation
     */
    public function setGeoLocation(string $geoLocation): Image
    {
        $this->geoLocation = $geoLocation;
		
		return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title): Image
    {
        $this->title = $title;
		
		return $this;
    }

    /**
     * @return string
     */
    public function getLicense(): string
    {
        return $this->license;
    }

    /**
     * @param string $license
     */
    public function setLicense(string $license): Image
    {
        $this->license = $license;
		
		return $this;
    }

    /**
     * @return string
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * @inheritdoc
     */
    public static function getLimit(): ?int
    {
        return self::LIMIT;
    }

    /**
     * @inheritdoc
     */
    public function write(\XMLWriter $writer): void
    {
        $writer->startElement('image:image');

        if (!empty($this->location)) {
            $writer->writeElement('image:loc', $this->location);
        }
        if (!empty($this->caption)) {
            $writer->writeElement('image:caption', $this->caption);
        }
        if (!empty($this->geoLocation)) {
            $writer->writeElement('image:geo_location', $this->geoLocation);
        }
        if (!empty($this->title)) {
            $writer->writeElement('image:title', $this->title);
        }
        if (!empty($this->license)) {
            $writer->writeElement('image:license', $this->license);
        }

        $writer->endElement();
    }

    /**
     * Writes XML namespace attribute
     * @param \XMLWriter $writer
     */
    public static function writeXmlNamepsace(\XMLWriter $writer): void
    {
        $writer->writeAttribute('xmlns:image', 'http://www.google.com/schemas/sitemap-image/1.1');
    }
}
