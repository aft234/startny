#!/usr/bin/env python
#coding=utf-8

if __name__ == "__main__":
    import pytz
    from datetime import datetime
    import sys
    import requests
    from requests.auth import HTTPBasicAuth
    html_file = open("emailstartny/initial_email.html")
    html_body = html_file.read()
    text_file = open("emailstartny/initial_email.txt")
    text_body = text_file.read()

    now = pytz.timezone("US/Eastern").fromutc(datetime.utcnow())
    url = "https://api.mailgun.net/v2/community.startny.co/messages"

    payload = {
        "from": "Adam Carver <adam@startny.com>",
        "to": "internal@community.startny.co",
        "subject": now.strftime("TEST: %B %d"),
        "html": html_body,
        "text": text_body
    }
    auth = HTTPBasicAuth("api", "key-1o403u2-vbcp5cy310omj5-mq3vfe3t6")
    res = requests.post(url, data=payload, auth=auth)
    if res.status_code != 200:
        print res.text
    else:
        print res.status_code
        print res.json()
    """
    if not msg:
        print "Err: Please supply a message"
    else:
        payload = {
            "from": "Joshua Kehn <josh@m.byjakt.com>",
            "to": "jakt-b6Wp@team.idonethis.com",
#           "cc": "walter@idonethis.com",
#           "to": "walter@idonethis.com",
#           "to": ["Joshua Kehn <josh@kehn.us>", "jakt-b6Wp@team.idonethis.com"],
            "subject": now.strftime("%B %d"),
            "text": msg
        }
        auth = HTTPBasicAuth("api", "key-1o403u2-vbcp5cy310omj5-mq3vfe3t6")
        res = requests.post(url, data=payload, auth=auth)
        if res.status_code != 200:
            print res.text
            sys.exit(1)
        print "{0}: {1}".format(res.status_code, msg)"""
