<svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" {{ $attributes }}>

    <!-- Background circle -->
    <circle cx="100" cy="100" r="95" fill="#4F46E5"/>

    <!-- Calendar body -->
    <rect x="40" y="60" width="120" height="90" rx="12" fill="white"/>

    <!-- Calendar top bar -->
    <rect x="40" y="60" width="120" height="25" rx="12" fill="#6366F1"/>

    <!-- Calendar rings -->
    <circle cx="70" cy="55" r="6" fill="#4F46E5"/>
    <circle cx="130" cy="55" r="6" fill="#4F46E5"/>

    <!-- Event dots -->
    <circle cx="70" cy="100" r="6" fill="#4F46E5"/>
    <circle cx="100" cy="100" r="6" fill="#4F46E5"/>
    <circle cx="130" cy="100" r="6" fill="#4F46E5"/>

    <circle cx="70" cy="125" r="6" fill="#4F46E5"/>
    <circle cx="100" cy="125" r="6" fill="#4F46E5"/>
    <circle cx="130" cy="125" r="6" fill="#4F46E5"/>

    <!-- Location pin (event highlight) -->
    <path d="M100 95
             C90 95, 85 105, 100 120
             C115 105, 110 95, 100 95Z"
          fill="#EF4444"/>

    <circle cx="100" cy="102" r="3" fill="white"/>

</svg>
