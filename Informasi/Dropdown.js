const toSelect = document.getElementById("to");
const fromSelect = document.getElementById("from");

// Dropdown to
const routes = {
  AHB: ["JED", "RUH", "DXB", "AMM"],
  HBE: ["JED", "RUH", "IST"],
  AMM: ["JED", "RUH", "IST", "SAW"],
  DXB: ["RUH", "JED", "IST", "LHR", "AMM", "KHI", "GYD", "US", "FR", "SLL"],
  IST: ["RUH", "JED", "DXB", "LHR", "SJJ", "SAW"],
  SAW: ["IST", "JED", "AMM"],
  JED: ["AHB", "RUH", "DXB", "IST", "SAW", "MED", "TIF", "TUU", "AMM", "KHI", "HMB", "HBE", "SLL"],
  KHI: ["DXB", "JED", "RUH"],
  MED: ["JED", "RUH", "DXB"],
  RUH: ["AHB", "JED", "DXB", "IST", "AMM", "KHI", "MED", "TIF", "TUU", "GYD", "HBE"],
  SLL: ["DXB", "RUH"],
  SJJ: ["IST", "LHR"],
  HMB: ["JED"],
  TUU: ["JED", "RUH"],
  TIF: ["JED", "RUH"],
  GYD: ["RUH", "DXB", "IST"],
  FR:  ["IST", "LHR", "DXB"],
  US:  ["DXB", "LHR"],
  LHR: ["IST", "DXB", "US", "FR", "SJJ"],
};

// Tampilan dropdown to
const airportLabels = {
  AHB: "Abha, Saudi Arabia (AHB)",
  HBE: "Alexandria, Egypt (HBE)",
  AMM: "Amman, Yordania (AMM)",
  DXB: "Dubai, United Arab Emirates (DXB)",
  IST: "Istanbul, Turkey (IST)",
  SAW: "Istanbul Sabiha, Turkey (SAW)",
  JED: "Jeddah, Saudi Arabia (JED)",
  KHI: "Karachi, Pakistan (KHI)",
  MED: "Madinah, Saudi Arabia (MED)",
  RUH: "Riyadh, Saudi Arabia (RUH)",
  SLL: "Salalah Airport, Oman (SLL)",
  SJJ: "Sarajevo, Bosnia And Herzegovina (SJJ)",
  HMB: "Sohag, Egypt (HMB)",
  TUU: "Tabuk, Saudi Arabia (TUU)",
  TIF: "Taif, Saudi Arabia (TIF)",
  GYD: "Baku, Azerbaijan (GYD)",
  FR: "Paris, Prancis (FR)",
  US: "New York, Amerika Serikat (US)",
  LHR: "London, Inggris (LHR)",
};

fromSelect.addEventListener("change", function () {
  const fromValue = this.value;
  toSelect.innerHTML = `<option value="" disabled selected hidden> Select Destination</option>`;

  if (routes[fromValue]) {
    routes[fromValue].forEach((code) => {
      const option = document.createElement("option");
      option.value = code;
      option.textContent = airportLabels[code] || code;
      toSelect.appendChild(option);
    });
  }
});
