<cfsetting enablecfoutputonly="Yes">
<!---
 * FCKeditor - The text editor for Internet - http://www.fckeditor.net
 * Copyright (C) 2003-2007 Frederico Caldeira Knabben
 *
 * == BEGIN LICENSE ==
 *
 * Licensed under the terms of any of the following licenses at your
 * choice:
 *
 *  - GNU General Public License Version 2 or later (the "GPL")
 *    http://www.gnu.org/licenses/gpl.html
 *
 *  - GNU Lesser General Public License Version 2.1 or later (the "LGPL")
 *    http://www.gnu.org/licenses/lgpl.html
 *
 *  - Mozilla Public License Version 1.1 or later (the "MPL")
 *    http://www.mozilla.org/MPL/MPL-1.1.html
 *
 * == END LICENSE ==
 *
 * This file include the functions that handle the Command requests
 * in the ColdFusion Connector.
--->
<cffunction name="FileUpload">
	<cfargument name="resourceType" type="string" required="yes" default="">
	<cfargument name="currentFolderPath" type="string" required="yes" default="">

	<cfset fileName = "">
	<cfset fileExt = "">

	<!--- Can be overwritten. The last value will be sent with the result --->
	<cfset customMsg = "">

	<cftry>

		<!--- TODO: upload to a temp directory and move file if extension is allowed --->

		<!--- first upload the file with an unique filename --->
		<cffile action="upload"
			fileField="NewFile"
			destination="#currentFolderPath#"
			nameConflict="makeunique"
			mode="644"
			attributes="normal">

		<cfif cffile.fileSize EQ 0>
			<cfthrow>
		</cfif>

		<cfset lAllowedExtensions = config.allowedExtensions[#resourceType#]>
		<cfset lDeniedExtensions = config.deniedExtensions[#resourceType#]>

		<cfif ( len(lAllowedExtensions) and not listFindNoCase(lAllowedExtensions,cffile.ServerFileExt) )
			or ( len(lDeniedExtensions) and listFindNoCase(lDeniedExtensions,cffile.ServerFileExt) )>

			<cfset errorNumber = "202">
			<cffile action="delete" file="#cffile.ServerDirectory##fs##cffile.ServerFile#">

		<cfelse>

			<cfscript>
			errorNumber = 0;
			fileName = cffile.ClientFileName;
			fileExt = cffile.ServerFileExt;

			// munge filename for html download. Only a-z, 0-9, _, - and . are allowed
			if( reFind("[^A-Za-z0-9_\-\.]", fileName) ) {
				fileName = reReplace(fileName, "[^A-Za-z0-9\-\.]", "_", "ALL");
				fileName = reReplace(fileName, "_{2,}", "_", "ALL");
				fileName = reReplace(fileName, "([^_]+)_+$", "\1", "ALL");
				fileName = reReplace(fileName, "$_([^_]+)$", "\1", "ALL");
			}

			// When the original filename already exists, add numbers (0), (1), (2), ... at the end of the filename.
			if( compare( cffile.ServerFileName, fileName ) ) {
				counter = 0;
				tmpFileName = fileName;
				while( fileExists("#currentFolderPath##fileName#.#fileExt#") ) {
					counter = counter + 1;
					fileName = tmpFileName & '(#counter#)';
				}
			}
			</cfscript>

			<!--- Rename the uploaded file, if neccessary --->
			<cfif compare(cffile.ServerFileName,fileName)>

				<cfset errorNumber = "201">
				<cffile
					action="rename"
					source="#currentFolderPath##cffile.ServerFileName#.#cffile.ServerFileExt#"
					destination="#currentFolderPath##fileName#.#fileExt#"
					mode="644"
					attributes="normal">

			</cfif>

		</cfif>

		<cfcatch type="Any">

			<cfset errorNumber = "1">
			<cfset customMsg = cfcatch.message >

		</cfcatch>

	</cftry>


	<cfif errorNumber EQ 0>
		<!--- file was uploaded succesfully --->
		<cfset SendUploadResults(errorNumber, '#userFilesPath##url.type#/#fileName#.#fileExt#')>
	<cfelseif errorNumber EQ 201>
		<!--- file was changed (201), submit the new filename --->
		<cfset SendUploadResults(errorNumber, '#userFilesPath##url.type#/#fileName#.#fileExt#', replace( fileName & "." & fileExt, "'", "\'", "ALL"), customMsg)>
	<cfelse>
		<!--- An error Tnured(202). Submit only the error code and a message (if available). --->
		<cfset SendUploadResults(errorNumber, '', '', customMsg)>
	</cfif>

</cffunction>

<cffunction name="SendUploadResults">
	<cfargument name="errorNumber" type="numeric" required="yes">
	<cfargument name="fileUrl" type="string" required="no" default="">
	<cfargument name="fileName" type="string" required="no" default="">
	<cfargument name="customMsg" type="string" required="no" default="">

	<cfoutput>
		<script type="text/javascript">
			window.parent.OnUploadCompleted(#errorNumber#, "#JSStringFormat(fileUrl)#", "#JSStringFormat(fileName)#", "#JSStringFormat(customMsg)#");
		</script>
	</cfoutput>

	<cfabort><!--- Result sent, stop processing this page --->
</cffunction>
