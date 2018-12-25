#include <iostream>
#include <string>
#include <vector>
#include <algorithm>
using namespace std;

vector <int> Dog(vector <int> s) {
	int tmp = 0;
	int j;
	for (int i = 0; i < s.size(); i++) {
		j = i;
		for (int k = i; k < s.size(); k++) {
			if (s[j] > s[k]) {
				j = k;
			}
		}
		tmp = s[i];
		s[i] = s[j];
		s[j] = tmp;
	}
	return s;
}
vector <int> Spectrum(vector <int> peptide) {
	int k = 0;
	int s = 0;

	vector <int> arr = { 0 };

	for (int i = 1; i <= peptide.size(); i++)
		arr.push_back(peptide[i - 1]);

	int size_arr = arr.size();

	for (int k = 1; k < size_arr - 1; k++) {
		if (k == size_arr - 2) {
			s = 0;
			for (int j = 1; j < size_arr; j++)
				s += arr[j];
			arr.push_back(s);
		}
		else {
			for (int j = 1; j < size_arr; j++) {
				if (j + k == size_arr) {
					s = 0;
					int w = j;
					while (w < size_arr) {
						s += arr[w];
						w++;
					}
					s += arr[1];
					arr.push_back(s);
				}
				else if (j + k > size_arr) {
					int i = j;
					s = 0;
					while (i < size_arr) {
						s += arr[i];
						i++;
					}

					for (int z = 1; z <= k; z++)
						s += arr[z];
					arr.push_back(s);
				}

				else {
					s = arr[j];
					for (int z = 1; z <= k; z++) {
						s += arr[j + z];
					}
					arr.push_back(s);
				}
			}

		}
	}
	arr = Dog(arr);
	return arr;
}
int Score(vector <int> peptide, vector <int> spectrum) {

	vector<int> mas = Spectrum(peptide);
	int count = 0;
	for (int i = 0; i < mas.size(); i++) {
		for (int z = 0; z < spectrum.size(); z++) {
			if (mas[i] == spectrum[z]) {
				spectrum[z] = 0;
				count++;
				break;
			}
		}
	}
	return count;
}
vector<int> Expand(vector <int> peptides, int k) {
	int aminomass[] = { 57, 71, 87, 97, 99, 101, 103, 113, 114, 115, 128, 129, 131, 137, 147, 156, 163, 186 };
	vector<int> arr;
	int size = 1;
	int count = 0;
	if (peptides.size() == 0) {
		for (int i = 0; i < 18; i++)
			arr.push_back(aminomass[i]);

	}

	else if (peptides.size() != 0) {
		size = peptides.size();
		for (int i = 0; i < size; i = i + k) {
			for (int j = 0; j < 18; j++) {
				count = i;
				for (int z = 0; z < k; z++) {
					arr.push_back(peptides[count]);
					count++;
				}
				count = 0;
				arr.push_back(aminomass[j]);
			}
		}
	}
	return arr;
}
int mass(vector<int> peptide)
{
	int res = 0;
	for (int i = 0; i < peptide.size(); i++)
		res += peptide[i];
	return res;
}
vector<int> Leader(vector<int> leaderboard, vector<int> spectrum, int m) {

	vector<int> s;
	vector<int> tmp, temp;
	int k, n, m1;
	int curr = 0;
	int curr_j = m;

	for (int i = 0; i < leaderboard.size(); i = i + m) {
		tmp = {};
		for (int j = 0; j < m; j++)
			tmp.push_back(leaderboard[i + j]);

		s.push_back(Score(tmp, spectrum));
	}
	for (int i = 0; i < s.size() - 1; i++) {
		curr_j = curr + m;
		for (int j = i + 1; j < s.size(); j++) {
			if (s[i] < s[j]) {
				n = s[i];
				temp = {};
				for (int z = 0; z < m; z++)
					temp.push_back(leaderboard[curr + z]);
				s[i] = s[j];
				for (int z = 0; z < m; z++)
					leaderboard[curr + z] = leaderboard[curr_j + z];
				s[j] = n;
				for (int z = 0; z < m; z++)
					leaderboard[curr_j + z] = temp[z];
			}
			if (m == 1)
				curr_j = curr_j + m;
			else curr_j = j * m;
		}
		curr = curr + m;
	}
	return leaderboard;
}
vector<int> trim(vector<int> leaderboard, vector<int> spectrum, int m, int N) {
	vector<int> s = {};
	vector<int> tmp = {};
	for (int i = 0; i < leaderboard.size(); i = i + m) {
		tmp = {};
		for (int j = 0; j < m; j++) {
			tmp.push_back(leaderboard[i + j]);
		}
		s.push_back(Score(tmp, spectrum));
	}
	s = Dog(s);
	int curr = -1;
	if (s.size() == 0)
		curr = 0;
	else if (s.size() >= N)
		curr = s[s.size() - N];
	else curr = s[0];
	vector<int> temp = {};
	for (int i = 0; i < leaderboard.size(); i = i + m) {
		tmp = {};
		for (int j = 0; j < m; j++) {
			tmp.push_back(leaderboard[i + j]);
		}
		if (Score(tmp, spectrum) >= curr) {
			for (int k = 0; k < m; k++) {
				temp.push_back(tmp[k]);
			}
		}
	}
	return temp;
}
vector<int> Result(int n, vector<int> spectrum) {
	vector<int> leaderboard = { 0 };
	vector<int> leaderpeptide;
	vector<int> tmp;
	vector<int> ttmp = {};
	int numberr = 1;
	int k = 0;
	int m = 0;
	while (!leaderboard.empty()) {
		if (k == 0)
			leaderboard = {};

		k++;
		if (m == n)
			break;

		leaderboard = Expand(leaderboard, m);
		m++;
		leaderboard = Leader(leaderboard, spectrum, m);
		int i = 0;
		while (i < (leaderboard.size() - m))
		{

			tmp = {};
			for (int j = 0; j < m; j++) {
				tmp.push_back(leaderboard[i + j]);
			}

			if (mass(tmp) == spectrum[spectrum.size() - 1])
			{
				if (Score(tmp, spectrum) > Score(leaderpeptide, spectrum))
				{
					reverse(tmp.begin(), tmp.end());
					leaderpeptide = tmp;
				}
				leaderboard.erase(leaderboard.begin() + i);
			}
			else if (mass(tmp) > spectrum[spectrum.size() - 1])
			{
				leaderboard.erase(leaderboard.begin() + i);
			}
			else
				i = i + m;
		}
		ttmp = {};
		ttmp = trim(leaderboard, spectrum, m, n);
		leaderboard = {};
		leaderboard = ttmp;
	}
	return leaderpeptide;

}

int main() {
	int n;
	cin >> n;
	vector <int> all, result;
	int i = 0, k;
	while (i < 10000) {
		cin >> k;

		if (cin.fail())
			break;

		all.push_back(k);
		i++;
	}
	result = Result(n, all);
	for (int i = 0; i < result.size(); i++)
		if (i == result.size() - 1)
			cout << result[i] << ' ';
		else
			cout << result[i] << '-';
	return 0;
}