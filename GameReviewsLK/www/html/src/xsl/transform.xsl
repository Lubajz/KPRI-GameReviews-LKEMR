<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="xml" indent="yes"/>
    <xsl:template match="/">
        <games>
            <xsl:apply-templates select="games/game"/>
        </games>
    </xsl:template>

    <xsl:template match="game">
        <game>
            <title><xsl:value-of select="title"/></title>
            <release_date><xsl:value-of select="release_date"/></release_date>
            <genre><xsl:value-of select="genre"/></genre>
            <developer><xsl:value-of select="developer"/></developer>
            <rating><xsl:value-of select="rating"/></rating>
            <review><xsl:value-of select="review"/></review>
        </game>
    </xsl:template>
</xsl:stylesheet>
