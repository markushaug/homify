# Contributing to Homify

:+1::tada: First off, thanks for taking the time to contribute! :tada::+1:

The following is a set of guidelines for contributing to Homify and its plug-ins, which are hosted by [Markus Haug](https://github.com/markushaug) on GitHub. These are mostly guidelines, not rules. Use your best judgment, and feel free to propose changes to this document in a pull request.

#### Table Of Contents

* [Code of Conduct](#code-of-conduct)

* [I don't want to read this whole thing, I just have a question!!!](#i-dont-want-to-read-this-whole-thing-i-just-have-a-question)
* [What should I know before I get started?](#what-should-i-know-before-i-get-started)
    * [Homify and Plug-ins](#Homify-and-plug-ins)
    * [Naming Conventions](#naming-conventions)
    
* [How Can I Contribute?](#how-can-i-contribute)
    * [Reporting Bugs](#reporting-bugs)
    * [Suggesting Enhancements](#suggesting-enhancements)
    * [Your First Code Contribution](#your-first-code-contribution)
    * [Pull Requests](#pull-requests)

* [Styleguides](#styleguides)
    * [Git Commit Messages](#git-commit-messages)
    * [Documentation Styleguide](#documentation-styleguide)
    
* [Additional Notes](#additional-notes)
    * [Issue and Pull Request Labels](#issue-and-pull-request-labels)

## Code of Conduct

This project and everyone participating in it is governed by the [Homify Code of Conduct](CODE_OF_CONDUCT.md). By participating, you are expected to uphold this code. Please report unacceptable behavior to [mh@markushaug.de](mailto:mh@markushaug.de).

## I don't want to read this whole thing I just have a question!!!

If you run into issues while using Homify or during development of a component, please use one of the following options:

- Tweet me [@_markushaug_](https://twitter.com/_markushaug_)
- Send me an email [mh@haugmarkus.de](mailto://mh@haugmarkus.de)


## What should I know before I get started?

### Homify and Plug-ins

Homify is an open-source smart-home platform running on PHP using the Laravel framework. The entire application is built using a modular approach so support for other devices or actions can be implemented easily.

To get a list of all installed plug-ins with your Homify installation, you can run the following command within the Homify folder.

```bash
$ php artisan module:list
```

#### Naming Conventions

There are a few conventions that have developed over time around Homify and the plug-ins:

* Plug-ins: ```homify-<plugin-name>```
* Classes Functions, Variables, ... : ```CamelCase```

## How Can I Contribute?

### Reporting Bugs

This section guides you through submitting a bug report for Homify. Following these guidelines helps maintainers and the community understand your report :pencil:, reproduce the behavior :computer: :computer:, and find related reports :mag_right:.

Before creating bug reports, please check [this list](#before-submitting-a-bug-report) as you might find out that you don't need to create one. When you are creating a bug report, please [include as many details as possible](#how-do-i-submit-a-good-bug-report). Fill out [the required template](ISSUE_TEMPLATE.md), the information it asks for helps us resolve issues faster.

> **Note:** If you find a **Closed** issue that seems like it is the same thing that you're experiencing, open a new issue and include a link to the original issue in the body of your new one.

#### Before Submitting A Bug Report

* **Determine [which repository the problem should be reported in](#Homify-and-packages)**.
* **Perform a [cursory search](https://github.com/search?q=+is%3Aissue+user%3AHomify)** to see if the problem has already been reported. If it has **and the issue is still open**, add a comment to the existing issue instead of opening a new one.

#### How Do I Submit A (Good) Bug Report?

Bugs are tracked as [GitHub issues](https://guides.github.com/features/issues/). After you've determined [which repository](#Homify-and-packages) your bug is related to, create an issue on that repository and provide the following information by filling in [the template](ISSUE_TEMPLATE.md).

Explain the problem and include additional details to help maintainers reproduce the problem:

* **Use a clear and descriptive title** for the issue to identify the problem.
* **Describe the exact steps which reproduce the problem** in as many details as possible. For example, start by explaining how you started Homify, e.g. which command exactly you used in the terminal, or how you started Homify otherwise. When listing steps, **don't just say what you did, but explain how you did it**. For example, if you moved the cursor to the end of a line, explain if you used the mouse, or a keyboard shortcut or an Homify command, and if so which one?
* **Provide specific examples to demonstrate the steps**. Include links to files or GitHub projects, or copy/pasteable snippets, which you use in those examples. If you're providing snippets in the issue, use [Markdown code blocks](https://help.github.com/articles/markdown-basics/#multiple-lines).
* **Describe the behavior you observed after following the steps** and point out what exactly is the problem with that behavior.
* **Explain which behavior you expected to see instead and why.**
* **Include screenshots and animated GIFs** which show you following the described steps and clearly demonstrate the problem. If you use the keyboard while following the steps, **record the GIF with the [Keybinding Resolver](https://github.com/Homify/keybinding-resolver) shown**. You can use [this tool](https://www.cockos.com/licecap/) to record GIFs on macOS and Windows, and [this tool](https://github.com/colinkeenan/silentcast) or [this tool](https://github.com/GNOME/byzanz) on Linux.
* **If the problem is related to performance or memory**, include a CPU profile capture into your report.
* **If the problem wasn't triggered by a specific action**, describe what you were doing before the problem happened and share more information using the guidelines below.

Provide more context by answering these questions:

* **Did the problem start happening recently** (e.g. after updating to a new version of Homify) or was this always a problem?
* If the problem started happening recently, **can you reproduce the problem in an older version of Homify?** What's the most recent version in which the problem doesn't happen? You can download older versions of Homify from [the releases page](https://github.com/Homify/Homify/releases).
* **Can you reliably reproduce the issue?** If not, provide details about how often the problem happens and under which conditions it normally happens.
* If the problem is related to working with files (e.g. opening and editing files), **does the problem happen for all files and projects or only some?** Does the problem happen only when working with local or remote files (e.g. on network drives), with files of a specific type (e.g. only JavaScript or Python files), with large files or files with very long lines, or with files in a specific encoding? Is there anything else special about the files you are using?

Include details about your configuration and environment:

* **What's the name and version of the OS you're using**?
* **Are you running Homify in a virtual machine?** If so, which VM software are you using and which operating systems and versions are used for the host and the guest?
* **Which plug-ins do you have installed?** You can get that list by running `$ php artisan module:list`.
* **What are your environment settings? Please do not share your password!

### Suggesting Enhancements

This section guides you through submitting an enhancement suggestion for Homify, including completely new features and minor improvements to existing functionality. Following these guidelines helps maintainers and the community understand your suggestion :pencil: and find related suggestions :mag_right:.

Before creating enhancement suggestions, please check [this list](#before-submitting-an-enhancement-suggestion) as you might find out that you don't need to create one. When you are creating an enhancement suggestion, please [include as many details as possible](#how-do-i-submit-a-good-enhancement-suggestion). Fill in [the template](ISSUE_TEMPLATE.md), including the steps that you imagine you would take if the feature you're requesting existed.

#### Before Submitting An Enhancement Suggestion

* **Check if there's already a solution which provides that enhancement.**

#### How Do I Submit A (Good) Enhancement Suggestion?

Enhancement suggestions are tracked as [GitHub issues](https://guides.github.com/features/issues/). After you've determined [which repository](#Homify-and-packages) your enhancement suggestion is related to, create an issue on that repository and provide the following information:

* **Use a clear and descriptive title** for the issue to identify the suggestion.
* **Provide a step-by-step description of the suggested enhancement** in as many details as possible.
* **Provide specific examples to demonstrate the steps**. Include copy/pasteable snippets which you use in those examples, as [Markdown code blocks](https://help.github.com/articles/markdown-basics/#multiple-lines).
* **Describe the current behavior** and **explain which behavior you expected to see instead** and why.
* **Include screenshots and animated GIFs** which help you demonstrate the steps or point out the part of Homify which the suggestion is related to. You can use [this tool](https://www.cockos.com/licecap/) to record GIFs on macOS and Windows, and [this tool](https://github.com/colinkeenan/silentcast) or [this tool](https://github.com/GNOME/byzanz) on Linux.
* **Explain why this enhancement would be useful** to most Homify users and isn't something that can or should be implemented as a [community package](#Homify-and-packages).
* **Specify which version of Homify you're using.** 
* **Specify the name and version of the OS you're using.**

### Your First Code Contribution

If you want to understand the core architectur of Homify, you should know the basic concept of [Laravel](https://laravel.com).

#### Local development

Homify Core and all plug-ins can be developed locally.

You can create a new plug-in by running the following command:
```bash
$ php artisan module:make <Homify<Name>
```

Change the package name in the plug-ins config.json to the convention ```homify-<plug-in>```

### Pull Requests

* Fill in [the required template](PULL_REQUEST_TEMPLATE.md)
* Do not include issue numbers in the PR title
* Include screenshots and animated GIFs in your pull request whenever possible.
* Document new code based
* Place requires in the following order:
    * Local Plug-ins (using relative paths)

## Styleguides

### Git Commit Messages

* Use the present tense ("Add feature" not "Added feature")
* Use the imperative mood ("Move cursor to..." not "Moves cursor to...")
* Limit the first line to 72 characters or less
* Reference issues and pull requests liberally after the first line
* When only changing documentation, include `[ci skip]` in the commit title
* Consider starting the commit message with an applicable emoji:
    * :art: `:art:` when improving the format/structure of the code
    * :racehorse: `:racehorse:` when improving performance
    * :non-potable_water: `:non-potable_water:` when plugging memory leaks
    * :memo: `:memo:` when writing docs
    * :penguin: `:penguin:` when fixing something on Linux
    * :apple: `:apple:` when fixing something on macOS
    * :checkered_flag: `:checkered_flag:` when fixing something on Windows
    * :bug: `:bug:` when fixing a bug
    * :fire: `:fire:` when removing code or files
    * :green_heart: `:green_heart:` when fixing the CI build
    * :white_check_mark: `:white_check_mark:` when adding tests
    * :lock: `:lock:` when dealing with security
    * :arrow_up: `:arrow_up:` when upgrading dependencies
    * :arrow_down: `:arrow_down:` when downgrading dependencies
    * :shirt: `:shirt:` when removing linter warnings


### Documentation Styleguide

* Use [Markdown](https://daringfireball.net/projects/markdown).
* Reference methods and classes in markdown with the custom `{}` notation:
    * Reference classes with `{ClassName}`
    * Reference instance methods with `{ClassName::methodName}`
    * Reference class methods with `{ClassName.methodName}`


## Additional Notes

### Issue and Pull Request Labels

This section lists the labels we use to help us track and manage issues and pull requests. Most labels are used across all Homify repositories, but some are specific to `markushaug/Homify`.

The labels are loosely grouped by their purpose, but it's not required that every issue have a label from every group or that an issue can't have more than one label from the same group.

Please open an issue on `markushaug/Homify` if you have suggestions for new labels, and if you notice some labels are missing on some repositories, then please open an issue on that repository.

#### Pull Request Labels

| Label name | Description
| --- | --- |
| `work-in-progress` | Pull requests which are still being worked on, more changes will follow. |
| `needs-review` | Pull requests which need code review, and approval from maintainers or Homify core team. |
| `under-review` | Pull requests being reviewed by maintainers or Homify core team. |
| `requires-changes` | Pull requests which need to be updated based on review comments and then reviewed again. |
| `needs-testing` | Pull requests which need manual testing. |

