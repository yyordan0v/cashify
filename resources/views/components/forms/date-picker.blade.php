<div x-data="{
    datePickerOpen: false,
    selectedDate: '',
    selectedTime: '',
    datePickerFormat: 'M d, Y',
    datePickerMonth: '',
    datePickerYear: '',
    datePickerDay: '',
    datePickerDaysInMonth: [],
    datePickerBlankDaysInMonth: [],
    datePickerMonthNames: [
        'January', 'February', 'March', 'April', 'May', 'June',
        'July', 'August', 'September', 'October', 'November', 'December'
    ],
    datePickerDays: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
    // Time picker additions
    selectedHour: '00',
    selectedMinute: '00',
    hours: [...Array(24)].map((_, i) => i.toString().padStart(2, '0')),
    minutes: [...Array(60)].map((_, i) => i.toString().padStart(2, '0')),
    timePickerOpen: false,
    toggleTimePicker() {
        this.timePickerOpen = !this.timePickerOpen;
    },
    setTime() {
        this.selectedTime = this.formatTime();
        this.timePickerOpen = false;
        if (!this.selectedDate) {
            let today = new Date();
            this.selectedDate = this.datePickerFormatDate(today);
        }
        this.datePickerOpen = false;
    },
    formatTime() {
        return `${this.selectedHour}:${this.selectedMinute}`;
    },
    // Existing methods...
    datePickerDayClicked(day) {
        let selectedDate = new Date(this.datePickerYear, this.datePickerMonth, day);
        this.selectedDate = this.datePickerFormatDate(selectedDate);
    },
    datePickerDayDoubleClicked(day) {
        let selectedDate = new Date(this.datePickerYear, this.datePickerMonth, day);
        this.selectedDate = this.datePickerFormatDate(selectedDate);
        if (!this.selectedTime) {
            this.selectedTime = '00:00';
        }
        this.datePickerOpen = false;
    },
    datePickerPreviousMonth(){
        if (this.datePickerMonth == 0) {
            this.datePickerYear--;
            this.datePickerMonth = 11;
        } else {
            this.datePickerMonth--;
        }
        this.datePickerCalculateDays();
    },
    datePickerNextMonth(){
        if (this.datePickerMonth == 11) {
            this.datePickerMonth = 0;
            this.datePickerYear++;
        } else {
            this.datePickerMonth++;
        }
        this.datePickerCalculateDays();
    },
    datePickerIsSelectedDate(day) {
        const d = new Date(this.datePickerYear, this.datePickerMonth, day);
        return this.datePickerFormatDate(d) === this.selectedDate;
    },
    datePickerIsToday(day) {
        const today = new Date();
        const d = new Date(this.datePickerYear, this.datePickerMonth, day);
        return today.toDateString() === d.toDateString();
    },
    datePickerCalculateDays() {
        let daysInMonth = new Date(this.datePickerYear, this.datePickerMonth + 1, 0).getDate();
        let firstDayOfMonth = new Date(this.datePickerYear, this.datePickerMonth, 1).getDay();
        firstDayOfMonth = (firstDayOfMonth === 0) ? 6 : firstDayOfMonth - 1;
        let blankdaysArray = [];
        for (var i = 0; i < firstDayOfMonth; i++) {
            blankdaysArray.push(i);
        }
        let daysArray = [];
        for (var i = 1; i <= daysInMonth; i++) {
            daysArray.push(i);
        }
        this.datePickerBlankDaysInMonth = blankdaysArray;
        this.datePickerDaysInMonth = daysArray;
    },
    datePickerFormatDate(date) {
        let formattedDay = this.datePickerDays[date.getDay() - 1];
        if (date.getDay() === 0) {
            formattedDay = this.datePickerDays[6];
        }
        let formattedDate = ('0' + date.getDate()).slice(-2);
        let formattedMonth = this.datePickerMonthNames[date.getMonth()];
        let formattedMonthShortName = this.datePickerMonthNames[date.getMonth()].substring(0, 3);
        let formattedYear = date.getFullYear();

        return `${formattedMonthShortName} ${formattedDate}, ${formattedYear}`;
    },
    clearDate() {
        this.selectedDate = '';
        this.selectedTime = '';
        this.datePickerOpen = false;
    }
}" x-init="
    currentDate = new Date();
    datePickerMonth = currentDate.getMonth();
    datePickerYear = currentDate.getFullYear();
    datePickerCalculateDays();
" x-cloak>
    <div class="mr-2">
        <div class="relative w-full">
            <input name="date_time"
                   x-ref="datePickerInput" type="text" @click="datePickerOpen=!datePickerOpen"
                   :value="selectedDate && selectedTime ? `${selectedDate} ${selectedTime}` : ''"
                   x-on:keydown.escape="datePickerOpen=false"
                   class="w-full flex rounded-lg mt-2 border-neutral-400/50 dark:border-neutral-600/50 dark:bg-neutral-900/50 dark:text-white focus:border-gray-500 focus:ring-gray-500"
                   readonly/>
            <div @click="clearDate()"
                 class="absolute top-0 right-0 cursor-pointer">
                <x-buttons.icon class="pb-2.5">
                    cancel
                </x-buttons.icon>
            </div>
            <div
                x-show="datePickerOpen"
                x-transition
                @click.away="
                    if (!selectedTime) {
                        selectedTime = '00:00';
                    }
                    datePickerOpen = false;
                "
                class="absolute z-20 top-0 left-0 max-w-lg p-4 mt-12 antialiased shadow w-[17rem] rounded-xl border bg-white/95 border-neutral-300/50 dark:border-neutral-800/50 dark:bg-neutral-900/95 dark:shadow backdrop-blur-lg">
                <div class="flex items-center justify-between mb-2">
                    <div>
                        <span x-text="datePickerMonthNames[datePickerMonth]"
                              class="text-lg font-bold text-gray-800 dark:text-gray-100"></span>
                        <span x-text="datePickerYear"
                              class="ml-1 text-lg font-normal text-gray-600 dark:text-gray-400"></span>
                    </div>
                    <div>
                        <button @click="datePickerPreviousMonth()" type="button"
                                class="inline-flex p-1 transition duration-100 ease-in-out rounded-full cursor-pointer focus:outline-none focus:shadow-outline hover:bg-gray-100 dark:hover:bg-gray-700">
                            <x-icon class="text-gray-400">
                                chevron_left
                            </x-icon>
                        </button>
                        <button @click="datePickerNextMonth()" type="button"
                                class="inline-flex p-1 transition duration-100 ease-in-out rounded-full cursor-pointer focus:outline-none focus:shadow-outline hover:bg-gray-100 dark:hover:bg-gray-700">
                            <x-icon class="text-gray-400">
                                chevron_right
                            </x-icon>
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-7 mb-3">
                    <template x-for="(day, index) in datePickerDays" :key="index">
                        <div class="px-0.5">
                            <div x-text="day"
                                 class="text-xs font-medium text-center text-gray-800 dark:text-gray-200"></div>
                        </div>
                    </template>
                </div>
                <div class="grid grid-cols-7">
                    <template x-for="blankDay in datePickerBlankDaysInMonth">
                        <div class="p-1 text-sm text-center border border-transparent"></div>
                    </template>
                    <template x-for="(day, dayIndex) in datePickerDaysInMonth" :key="dayIndex">
                        <div class="px-0.5 mb-1 aspect-square">
                            <div
                                x-text="day"
                                @click="datePickerDayClicked(day)"
                                @dblclick="datePickerDayDoubleClicked(day)"
                                :class="{
                                    'bg-neutral-200 dark:bg-neutral-400': datePickerIsToday(day),
                                    'bg-neutral-800 dark:bg-neutral-100 text-white dark:text-black hover:bg-opacity-75': datePickerIsSelectedDate(day),
                                    'text-gray-600 dark:text-gray-300 hover:bg-neutral-200 dark:hover:bg-neutral-700': !datePickerIsToday(day) && !datePickerIsSelectedDate(day)
                                }"
                                class="flex items-center justify-center text-sm leading-none text-center rounded-lg cursor-pointer h-7 w-7 dark:text-gray-300"></div>
                        </div>
                    </template>
                </div>

                <div class="mt-4">
                    <label for="time" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Select
                        time:</label>
                    <div class="relative">
                        <input type="text"
                               x-model="formatTime()"
                               @click="toggleTimePicker()"
                               class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500"
                               readonly/>

                        <div x-show="timePickerOpen"
                             class="absolute z-10 mt-1 bg-white dark:bg-gray-800 rounded-lg shadow-lg p-4">
                            <div class="flex justify-between mb-4">
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Hour</label>
                                    <select x-model="selectedHour"
                                            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-gray-500 focus:border-gray-500 sm:text-sm rounded-md">
                                        <template x-for="hour in hours">
                                            <option :value="hour" x-text="hour"></option>
                                        </template>
                                    </select>
                                </div>
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Minute</label>
                                    <select x-model="selectedMinute"
                                            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-gray-500 focus:border-gray-500 sm:text-sm rounded-md">
                                        <template x-for="minute in minutes">
                                            <option :value="minute" x-text="minute"></option>
                                        </template>
                                    </select>
                                </div>
                            </div>
                            <button @click="setTime()"
                                    type="button"
                                    class="w-full bg-gray-500 text-white rounded-md px-4 py-2 hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                                Set Time
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
