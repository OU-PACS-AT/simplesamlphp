<?php
/**
 * SAML 2.0 remote IdP metadata for SimpleSAMLphp.
 *
 * Remember to remove the IdPs you don't use from this file.
 *
 * See: https://simplesamlphp.org/docs/stable/simplesamlphp-reference-idp-remote
 */
$metadata['sso.ou.edu'] = array (
		'entityid' => 'sso.ou.edu',
		'contacts' =>
		array (
				0 =>
				array (
						'contactType' => 'administrative',
						'company' => 'University of Oklahoma',
						'givenName' => 'Mark',
						'surName' => 'McClellan',
						'emailAddress' =>
						array (
								0 => 'sso_requests@ou.edu',
						),
						'telephoneNumber' =>
						array (
								0 => '405-325-1810',
						),
				),
		),
		'metadata-set' => 'saml20-idp-remote',
		'SingleSignOnService' =>
		array (
				0 =>
				array (
						'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
						'Location' => 'https://sso.ou.edu/idp/SSO.saml2',
				),
				1 =>
				array (
						'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
						'Location' => 'https://sso.ou.edu/idp/SSO.saml2',
				),
		),
		'SingleLogoutService' =>
		array (
		),
		'ArtifactResolutionService' =>
		array (
		),
		'NameIDFormats' =>
		array (
				0 => 'urn:oasis:names:tc:SAML:1.1:nameid-format:unspecified',
		),
		'keys' =>
		array (
				0 =>
				array (
						'encryption' => false,
						'signing' => true,
						'type' => 'X509Certificate',
						'X509Certificate' => '
MIIFFjCCAv6gAwIBAgIGAVWYYTeDMA0GCSqGSIb3DQEBDQUAMEsxCzAJBgNVBAYTAlVTMR8wHQYDVQQKExZVbml2ZXJzaXR5IG9mIE9rbGFob21hMRswGQYDVQQDExJzaWduaW5nLnNzby5vdS5lZHUwIBcNMTYwNjI4MTg1OTE1WhgPMjExNjA2MDQxODU5MTVaMEsxCzAJBgNVBAYTAlVTMR8wHQYDVQQKExZVbml2ZXJzaXR5IG9mIE9rbGFob21hMRswGQYDVQQDExJzaWduaW5nLnNzby5vdS5lZHUwggIiMA0GCSqGSIb3DQEBAQUAA4ICDwAwggIKAoICAQCVhDlgsvc2+6r23QAv2czITg/LAT8xuaXs7eFW7/bhBRK69uAL3aaOWRgsnBMEfhAIS+qCkh5SOkDPs1RjF7JGqbU1fo/u5W9G2lMVTYrAIAmdzgd1xaOHORpCe+ygxEaOAANKo65l94fcDJqb7QEmPCoPaBTbSOy3MogXoJ/wOq9az+VwXy0Myp8+Y7SXRDlT4SU0WBvUyz27oHJQFaLDddYxPOSIEpRLQtNI465JaJ5NpgWgKl39xhLmhzyArNp3rEJ3pN2EOzA1Zy4vZj1xxBwzj5/8ojFfhR0G/hDjRhYQGDraDu0k/TLkLbN/zIPS7FlwlDd/s0URqTdEM9gLbMAYIfuXatM9ZkoN76K/y1rsyQyikhq254AbpblR6DFov1GwMZmbVnd91g8zXndE2IyejImtpjZGa+4vsnnsFNTE8IX9jbFngqQyPmuMZAxlCr6V/YdGbXcnpMTGBsABXH3lL70lcAyPWKmKW3/MmZ+tJc/3kwvuih9N6ZUQybBKvpykJ3CWN1+FlQnRADSaFxU5dfGfbrKWHC5iHNsLFe6OQfWELvwplXaggzPwn+0pt4nJAl40wWM+JYe4i+381fwyptRQIOnRmkCsL+u5fL+R0PLyXtn9VHyL4AmtdbPGXV71ETDOgp2gQ968vCtFBaaVYymIUIpik98QNVtJ6wIDAQABMA0GCSqGSIb3DQEBDQUAA4ICAQBMSjp76hUN4QRgm9mMGFdikL4htzYzhUccLe4PgyC6ekh7h7mivp4K8+C6o3jJbFeTQzSd11K6bAYZA2QbrGMuqlP/IBKtr1wO1LZ58DgsW6W0hDLClkv8DNFuyLA2hgh+i6iIv01zWsJlzknlQ9IvfB7BqK2fNgX2ZcmsLadVGx1CD5svvePbxuZJtdxOwzytY35T/kmNZWL8r30kWJBlpNIRHQapwnXZwWerjkXO0TFSfIgdJSxB5qtSJ1bk6xtSf61VV0st2LRBOb65ix+ihh9Ds8UxqZhw44GbrfEhn91EYmuR8D7pjZw6+HRruCrEQyU2/A3fVpiy7XlqP1iLGAsHrqxwMlEz/9L2SQ23PPClukDOT5kyGN5H8h762CfXM9YKdgdSwB7o45xgcBnrGt+TwBNoSqEEjlKdjMmUZTFavgIZqgLueGkUBbLU2sDb1Y78VsCQjixUnY3RsMIkvDX4hd2v/+WDGGzqMGsWZfSKGCjuDEvbcMufWm/8PpKzC6nu21b+Frtnk30xYD3Hi39grGG771p83X8ZneKMcLETq5znRByEZQZYPvox/Ju8dciZtZptlKCpPO4I49tGpmBbOf6dH9qWFewmmYoAuJBieBAAisQ0kyHMZWZ0AwmjYEZORMSutyFqO4iQH8S4DiT1Hgc2rtKqHle+eGV6+w==
',
				),
		),
);

