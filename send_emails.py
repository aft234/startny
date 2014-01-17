#!/usr/bin/env python
#coding=utf-8

if __name__ == "__main__":
    import sys
    import pytz
    import random
    from datetime import datetime
    import requests
    from requests.auth import HTTPBasicAuth
    html_file = open("emailstartny/initial_email.html")
    html_body = html_file.read()
    text_file = open("emailstartny/initial_email.txt")
    text_body = text_file.read()

    now = pytz.timezone("US/Eastern").fromutc(datetime.utcnow())
    url = "https://api.mailgun.net/v2/community.startny.co/messages"

    payload = {
        "from": "Caroline Taylor <info@community.startny.co>",
        "to": "internal@community.startny.co",
        "subject": "--MASTER EMAIL--{0}: Strange Question?".format(random.randint(10, 99)),
        "html": html_body,
        "text": text_body,
        "h:Reply-To": "Start NY <start@startny.co>",
        # Tracking information
        "o:tracking": "yes",
        "o:tracking-opens": "yes",
        "o:tracking-clicks": "yes",
        # Campaign information
        "o:tag": "Launch Email",
        "o:campaign": "gm_launch_campaign",
    }
    auth = HTTPBasicAuth("api", "key-1o403u2-vbcp5cy310omj5-mq3vfe3t6")
    res = requests.post(url, data=payload, auth=auth)
    if res.status_code != 200:
        print res.text
    else:
        print res.status_code
        print res.json()