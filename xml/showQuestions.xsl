<?xml version="1.0" encoding="utf-8" ?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="2.0" >
<xsl:output method="html" encoding="UTF-8"/>
<xsl:template match="/">
    <html>
        <head>
            <title>Galderak</title>
        </head>
        <body>
            <h1>GALDERAK</h1>
            <table width="100%" border="1">
                <tr>
                    <th>Galdera</th>
					<th>Arloa</th>
					<th>Zailtasuna</th>
                    <th>Erantzun zuzena</th>
                    <th>Erantzun okerrak</th>
                </tr>
                <xsl:for-each select="assessmentItems/assessmentItem">
                    <tr>
                        <td><xsl:value-of select="itemBody"/></td>
						<td><xsl:value-of select="@subject"/></td>
						<td><xsl:value-of select="@complexity"/></td>
						<td><xsl:value-of select="correctResponse"/></td>
						<td>  
							<xsl:for-each select="incorrectResponses">
								<xsl:value-of select="value1"/>, 
								<xsl:value-of select="value2"/>, 	
								<xsl:value-of select="value3"/>	
							</xsl:for-each>							
						</td>
                    </tr>
                </xsl:for-each>
 
            </table>
        </body>
    </html>
</xsl:template>
</xsl:stylesheet>