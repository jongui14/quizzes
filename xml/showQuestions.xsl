<?xml version="1.0" encoding="utf-8" ?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="2.0">
<xsl:output method="html" encoding="UTF-8"/>
<xsl:template match="/">
    <html>
        <head>
            <title>Poetas</title>
        </head>
        <body>
            <h3>Poetas del 27</h3>
            <table border="1">
                <thead>
                    <th>Nombre</th>
                    <th>Nacimiento</th>
                    <th>Pais</th>
                </thead>
                <xsl:for-each select="Poetas/Poeta">
                    <tr>
                        <td>
                            <a href="{enlace}">
                                <xsl:value-of select="nombre" />
                                <xsl:text> </xsl:text>
                                <xsl:value-of select="apellidos" />
                            </a>
                        </td>
                        <td>
                            <xsl:value-of select="@nacimiento" />
                        </td>
                        <td>
                            <xsl:value-of select="@pais" />
                        </td>
                    </tr>
                </xsl:for-each>
 
            </table>
        </body>
    </html>
</xsl:template>
</xsl:stylesheet>