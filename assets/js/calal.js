const Calendar = tui.Calendar;

class CalalCalendar {
    constructor(id, opts) {
        this.id = id;
        this.elem = document.getElementById(id);

        opts.usageStatistics = false;

        const today = Date();

        this.cal = new Calendar(this.elem, opts);
        this.updatePage(today.getYear(), today.getMonth());
    }

    updatePage(year, month) {
        fetch('/calal/v1/events/' + year + '/' + month)
            .then((response) => { return response.json(); })
            .then((data) => { this.cal.createEvents(data); })
            .catch(() => { console.error('Could not load data'); });
    }
}
