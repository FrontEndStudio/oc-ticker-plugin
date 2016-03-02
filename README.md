# October CMS Ticker plugin

## About

This is a Ticker plugin for [October CMS](https://octobercms.com).
It can be used to show a stock-ticker or scrollable news-flashes.

## Supported fields

title, content, status, sort_order

## Functionality backend

* Create
* Update
* Delete
* Reorder (Sortable)

## Plugin properties

**Sorting**
- sortColumn (autocomplete): Model column the records should be ordered by
- sortDirection (dropdown): [asc|desc]

## How to use this component in October CMS

To use the component, drop it on a page, fill in the plugin properties and use the `{% component 'tickerList' %}` tag anywhere in the page code to render it. The next example shows a simplest page code that uses the ticker component:

**tickerList**

```
[tickerList]
sortColumn = "sort_order"
sortDirection = "desc"
==
{% component 'tickerList'%}
```

### extraData

If you want to pass extra data to the tickerList template you can assign this as parameter.

```
{% component 'tickerList' extraData=myVariable %}
```
