import { FC, useEffect, useState } from "react";

import styles from "./stream-page.module.css";

interface Meeting {
  id: number;
  title: string;
  date_start: string;
  specialist_id: number;
  status: string;
  broadcast_link: string;
  created_at: string;
  updated_at: string;
}

export const StreamPage: FC = () => {
  const [meetings, setMeetings] = useState<Meeting[]>([]);
  const [selectedStatus, setSelectedStatus] = useState<string>("");

  useEffect(() => {
    const filterParams: Record<string, string> = {};

    if (selectedStatus) {
      filterParams["filter[status]"] = selectedStatus;
    }

    const url = new URL("http://localhost:8000/api/meetings");
    url.search = new URLSearchParams(filterParams).toString();

    fetch(url.toString())
      .then((response) => response.json())
      .then((data) => {
        setMeetings(data.data);
      })
      .catch((error) => {
        console.error("Error fetching meetings:", error);
      });
  }, [selectedStatus]);

  const formatDateTime = (dateTime: string): string => {
    const options = {
      year: "numeric",
      month: "long",
      day: "numeric",
      hour: "numeric",
      minute: "numeric",
    };

    return new Date(dateTime).toLocaleDateString(undefined, options);
  };

  const formatStatus = (status: string): string => {
    if (status === "not_started") {
      return "Запланирована";
    } else if (status === "in_progress") {
      return "В процессе";
    } else if (status === "finished") {
      return "Завершена";
    }
    return status;
  };

  const handleStatusChange = (event: React.ChangeEvent<HTMLSelectElement>) => {
    setSelectedStatus(event.target.value);
  };

  return (
    <>
      <div className={styles.PageTitleContainer}>
        <p className={styles.PageTitleText}>Трансляции</p>
      </div>
      <div className={styles.Container}>
        <div>
          <div className={styles.FilterSection}>
            <div className={styles.Status}>
              <p className={styles.StatusText}>Статус трансляции: </p>
              <select
                className={styles.StatusDropdown}
                value={selectedStatus}
                onChange={handleStatusChange}
              >
                <option value="">Все</option>
                <option value="not_started">Запланированные</option>
                <option value="in_progress">В процессе</option>
                <option value="finished">Завершенные</option>
              </select>
            </div>
            <div className={styles.SubmitFilterContainer}>
              <button className={styles.SubmitFilterButton}>Применить</button>
            </div>
          </div>
          <div className={styles.MeetingsList}>
            {meetings.map((meeting) => (
              <div key={meeting.id} className={styles.MeetingCard}>
                <div className={styles.TitleBox}>
                  <h2 className={styles.MeetingTitle}>{meeting.title}</h2>
                  <p className={styles.MeetingDate}>
                    {formatDateTime(meeting.date_start)}
                  </p>
                </div>
                <p className={styles.MeetingStatus}>
                  {formatStatus(meeting.status)}
                </p>
              </div>
            ))}
          </div>
        </div>
      </div>
    </>
  );
};
