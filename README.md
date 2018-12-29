# kodeaffe

A little web page to show kodeaffe's accomplishments. Check
https://kodeaffe.github.io to see it live.


## Build

The pages are generated with jinja templates. Should you need to regenerate
them:

```bash
$ pip install -r requirements.txt
```

to install the dependencies (preferably in a virtualenv).

Then run

```bash
$ staticjinja build
```

to build them.
